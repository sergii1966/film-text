<?php

namespace App\Http\Actions\Backend\Poster;

use App\Contracts\Backend\Poster\ValidateDelPosterContract;

class ValidateDelPosterAction implements ValidateDelPosterContract
{
    /**
     * @param $request
     * @return array|null
     */
    public function dataValidate($request): ?array
    {
        return $request->validated();
    }
}
