<?php

namespace App\Contracts\Backend\Poster;

use App\Models\Film;

interface DelPosterContract
{
    public function __construct(string $relation);

    public function del(array $data): ?Film;
}
