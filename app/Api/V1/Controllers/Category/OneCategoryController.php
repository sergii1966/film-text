<?php

namespace App\Api\V1\Controllers\Category;

use App\Api\V1\Resources\AllFilmsResourceCollection;
use App\Http\Controllers\Controller;
use App\Models\Film;

class OneCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(?string $id)
    {
        $items = Film::query();
        $items = $items->with(['categories', 'poster']);
        $items = $items->where('status', true);
        $items = $items->whereHas('categories', function ($query) use ($id) {
            $query->where('category_id', '=', $id);
        });

        $items = $items->paginate(2);

        return $items->isNotEmpty() ? (new AllFilmsResourceCollection($items))
            : false;
    }
}
