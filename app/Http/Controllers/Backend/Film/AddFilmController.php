<?php

namespace App\Http\Controllers\Backend\Film;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AddFilmController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return response()->view('backend.film.add-film');
    }
}
