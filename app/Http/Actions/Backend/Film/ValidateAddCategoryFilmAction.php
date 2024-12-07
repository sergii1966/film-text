<?php

namespace App\Http\Actions\Backend\Film;

use App\Contracts\Backend\Film\ValidateAddCategoryFilmContract;

class ValidateAddCategoryFilmAction implements ValidateAddCategoryFilmContract
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
