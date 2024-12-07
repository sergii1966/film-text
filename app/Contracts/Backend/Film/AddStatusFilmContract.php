<?php

namespace App\Contracts\Backend\Film;

use App\Models\Film;

interface AddStatusFilmContract
{
    public function createOrUpdate(array $data): ?Film;
}
