<?php

namespace App\Contracts\Backend\Poster;


use App\Models\Film;

interface EditPosterContract
{
    public function __construct(string $relation);
    public function createOrUpdate(array $data): ?Film;
}
