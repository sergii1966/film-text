<?php

namespace App\Http\Controllers\Backend\Film;

use App\Http\Actions\Backend\Poster\RemoveAllPostersAction;
use App\Http\Controllers\Controller;
use App\Models\Film;


class DelFilmController extends Controller
{
    public function __invoke(?string $id = null, RemoveAllPostersAction $res)
    {
        if (!($model = Film::query()
            ->where('id', $id)
            ->with(['poster'])
            ->first()
        )
        ) {
            abort(404);
        }

        return ($res->remove($model->images ?? null) && $model->delete())
            ? redirect()->route('admin.all.products.admin')
            : redirect()->route('admin.all.products.admin')
                ->with('error', __('Щось пішло не так!'));
    }
}
