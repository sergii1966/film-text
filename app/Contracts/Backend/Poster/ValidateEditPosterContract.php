<?php

namespace App\Contracts\Backend\Poster;

interface ValidateEditPosterContract
{
    public function dataValidate($request): ?array;
}
