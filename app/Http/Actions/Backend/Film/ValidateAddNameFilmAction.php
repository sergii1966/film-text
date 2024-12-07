<?php

namespace App\Http\Actions\Backend\Film;

use App\Contracts\Backend\Film\ValidateAddNameFilmContract;

class ValidateAddNameFilmAction implements ValidateAddNameFilmContract
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
