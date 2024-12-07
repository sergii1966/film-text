<?php

namespace App\Http\Controllers\Backend\Film;

use App\Contracts\Backend\Film\AddNameFilmContract;
use App\Contracts\Backend\Film\ValidateAddNameFilmContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Film\AddNameFilmRequest;

class AddNameFilmController extends Controller
{
    /**
     * @param AddNameFilmRequest $request
     * @param AddNameFilmContract $res
     * @param ValidateAddNameFilmContract $val
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(
        AddNameFilmRequest          $request,
        AddNameFilmContract         $res,
        ValidateAddNameFilmContract $val
    )
    {
        $model = $res->createOrUpdate($val->dataValidate($request));

        return ($model) ?
            redirect()
                ->route('edit-film-backend', ['id' => $model->id ?? null])
                ->withFragment('edit-name-film-admin')
            :
            redirect()->back()
            ->with('error', __('Щось пішло не так!'));
    }
}
