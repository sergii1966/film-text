<?php

namespace App\Contracts\Backend\Film;

interface ValidateAddNameFilmContract
{
    public function dataValidate($request): ?array;
}
