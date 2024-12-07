<?php

namespace App\Http\Actions\Backend\Poster;

use App\Contracts\Backend\Poster\ValidateEditPosterContract;

class ValidateEditPosterAction implements ValidateEditPosterContract
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
