<?php

namespace App\Http\Controllers\Backend\Film;

use App\Contracts\Backend\Film\AddStatusFilmContract;
use App\Contracts\Backend\Film\ValidateAddStatusFilmContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Film\AddStatusFilmRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class AddStatusFilmController extends Controller
{
    /**
     * @param AddStatusFilmRequest $request
     * @param AddStatusFilmContract $res
     * @param ValidateAddStatusFilmContract $val
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(
        AddStatusFilmRequest $request,
        AddStatusFilmContract $res,
        ValidateAddStatusFilmContract $val
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
