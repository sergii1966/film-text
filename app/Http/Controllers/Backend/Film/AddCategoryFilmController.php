<?php

namespace App\Http\Controllers\Backend\Film;

use App\Contracts\Backend\Film\AddCategoryFilmContract;
use App\Contracts\Backend\Film\ValidateAddCategoryFilmContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Film\AddCategoryFilmRequest;

class AddCategoryFilmController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        AddCategoryFilmRequest $request,
        AddCategoryFilmContract $res,
        ValidateAddCategoryFilmContract $val
    )
    {
        $model = $res->createOrUpdate($val->dataValidate($request));

        return ($model) ?
            redirect()->route('edit-film-backend', [
                'id' => $model->id ?? null,
            ]) :
            redirect()->back()
                ->with('error', __('Щось пішло не так!'));
    }
}
