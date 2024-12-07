<?php

namespace App\Contracts\Backend\Film;

interface ValidateAddStatusFilmContract
{
    public function dataValidate($request): ?array;
}
