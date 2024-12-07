<?php

namespace App\Http\Controllers\Backend\Poster;

use App\Contracts\Backend\Poster\AddPosterContract;
use App\Contracts\Backend\Poster\EditPosterContract;
use App\Contracts\Backend\Poster\ValidateAddPosterContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Poster\AddPosterRequest;

class AddPosterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        AddPosterRequest          $request,
        AddPosterContract         $res,
        ValidateAddPosterContract $val,
        EditPosterContract        $save
    )
    {
        $data = $val->dataValidate($request);
        //Only webp type!!
        if (
            ($res = $res->setImage($data['poster']))
            && ($res = $res->setIdItem($data['film_id']))
            && ($res = $res->setDirName('film'))
            && ($res = $res->setDirNameForItem($data['film_id']))
            && ($res = $res->setForeignId('film_id'))
            && ($res = $res->setTypeImage('webp'))
            && ($res = $res->setHeightAndWidthImageSm(height: 380, width: 380))
            && ($res = $res->setHeightAndWidthImageLg(height: 600, width: 600))
            && ($res = $res->makeSmAndLgDirs())
            && ($res = $res->putImageToTmp())
            && ($res = $res->putImage())
            && ($res->deleteImageFromTmp(true))
        ) {
            return ($model = $save->createOrUpdate($res->dataImgToSave()))
                ? redirect()->route('edit-film-backend', [
                    'id' => $model->id ?? null
                ])->withFragment('edit-poster')
                : redirect()->back()
                    ->withFragment('edit-poster')
                    ->with('error', __('Щось пішло не так!'));
        }

        return redirect()->back()
            ->withFragment('edit-poster')
            ->withErrors(['image' => __('Щось пішло не так!')]);
    }
}
