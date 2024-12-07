<?php

namespace App\Contracts\Backend\Poster;

interface ValidateAddPosterContract
{
    public function dataValidate($request): ?array;
}
