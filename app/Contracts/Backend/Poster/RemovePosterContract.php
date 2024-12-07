<?php

namespace App\Contracts\Backend\Poster;

interface RemovePosterContract
{
    public function remove(array $data): bool;
}
