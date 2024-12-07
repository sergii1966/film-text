<?php

namespace App\Contracts\Backend\Poster;

interface ValidateDelPosterContract
{
    public function dataValidate($request): ?array;
}
