<?php

namespace App\Http\Actions\Backend\Poster;

use App\Contracts\Backend\Poster\ValidateAddPosterContract;

class ValidateAddPosterAction implements ValidateAddPosterContract
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
