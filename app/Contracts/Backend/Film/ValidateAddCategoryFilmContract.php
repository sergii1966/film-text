<?php

namespace App\Contracts\Backend\Film;

interface ValidateAddCategoryFilmContract
{
    public function dataValidate($request): ?array;
}
