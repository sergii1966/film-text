<?php

namespace App\Api\V1\Controllers\Film;

use App\Api\V1\Resources\AllFilmsResourceCollection;
use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class AllFilmsController extends Controller
{
    /**
     * @param Request $request
     * @return AllFilmsResourceCollection|false
     */
    public function __invoke(Request $request)
    {
        $items = Film::query();

        $items = $items->where('status', 1);

        $items = $items->with(['poster', 'categories']);

        $items = $items->orderBy('id', 'desc')->paginate(2);

        return $items->isNotEmpty() ? (new AllFilmsResourceCollection($items))
            : false;
    }
}
