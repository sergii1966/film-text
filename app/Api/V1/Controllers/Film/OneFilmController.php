<?php

namespace App\Api\V1\Controllers\Film;

use App\Api\V1\Resources\OneFilmResource;
use App\Http\Controllers\Controller;
use App\Models\Film;

class OneFilmController extends Controller
{
    /**
     * @param string|null $id
     * @return OneFilmResource|bool
     */
    public function __invoke(?string $id): OneFilmResource|bool
    {
        $item = Film::query()
            ->where('status', true)
            ->where('id', $id)
            ->with(['poster', 'categories'])
            ->first();

       return $item ? (new OneFilmResource($item))
        : false;
    }
}
