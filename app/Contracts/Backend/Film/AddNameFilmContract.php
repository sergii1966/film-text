<?php

namespace App\Contracts\Backend\Film;

use App\Models\Film;

interface AddNameFilmContract
{
    public function createOrUpdate(array $data): ?Film;
}
