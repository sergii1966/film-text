<?php

namespace App\Http\Actions\Backend\Film;

use App\Contracts\Backend\Film\ValidateAddStatusFilmContract;

class ValidateAddStatusFilmAction implements ValidateAddStatusFilmContract
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
