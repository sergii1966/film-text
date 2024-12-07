<?php

namespace App\Http\Controllers\Backend\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class AllFilmsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $items = Film::query()
            ->orderBy('id', 'desc')
            ->paginate(10);

        return response()->view('backend.film.all-films', [
            'items' => $items
        ]);
    }
}
