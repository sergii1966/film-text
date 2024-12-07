<?php

namespace App\Api\V1\Controllers\Category;

use App\Api\V1\Resources\CategoryResourceCollection;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $items = Category::all();

        return $items->isNotEmpty() ? (new CategoryResourceCollection($items))
            : false;
    }
}
