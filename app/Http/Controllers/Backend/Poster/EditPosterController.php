<?php

namespace App\Http\Controllers\Backend\Poster;

use App\Contracts\Backend\Poster\EditPosterContract;
use App\Contracts\Backend\Poster\ValidateEditPosterContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Poster\EditPosterRequest;

class EditPosterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        EditPosterRequest          $request,
        EditPosterContract         $res,
        ValidateEditPosterContract $val
    ) {
       return ($model = $res->createOrUpdate($val->dataValidate($request)))
            ? redirect()->route('admin.edit.film.admin', [
                'id' => $model->id ?? null
            ])->withFragment('add-image-film-admin')
            : redirect()->back()
                ->with('error', __('Щось пішло не так!'));
    }
}
