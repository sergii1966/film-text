<?php

namespace App\Http\Controllers\Backend\Poster;

use App\Contracts\Backend\Poster\DelPosterContract;
use App\Contracts\Backend\Poster\RemovePosterContract;
use App\Contracts\Backend\Poster\ValidateDelPosterContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Poster\DelPosterRequest;


class DelPosterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        DelPosterRequest          $request,
        DelPosterContract         $res,
        ValidateDelPosterContract $val,
        RemovePosterContract      $rem
    ) {
        if(!$rem->remove($val->dataValidate($request))){
            redirect()->back()->withErrors(['film_id' => __('Щось пішло не так!')]);
        }

        return ($model = $res->del($val->dataValidate($request)))
            ? redirect()->route('edit-film-backend', [
                'id' => $model->id ?? null
            ])->withFragment('edit-poster')
            : redirect()->back()
                ->with('error', __('Щось пішло не так!'));
    }
}
