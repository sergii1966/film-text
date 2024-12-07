<?php

namespace App\Contracts\Backend\Film;

use App\Models\Film;

interface AddCategoryFilmContract
{
    public function createOrUpdate(array $data): ?Film;
}
