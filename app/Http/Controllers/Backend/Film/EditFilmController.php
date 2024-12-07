<?php

namespace App\Http\Controllers\Backend\Film;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Film;

class EditFilmController extends Controller
{
    /**
     * @param string|null $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke(?string $id = null)
    {
        if(!($model = Film::query()
            ->where('id', $id)
            ->with(['categories', 'poster'])
            ->first()
        )
        ){
            abort(404);
        }

        return response()->view('backend.film.add-film', [
            'model' => $model,
            'categories' => Category::all() ?? null,
        ]);
    }
}
