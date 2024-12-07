<?php

namespace App\Contracts\Backend\Poster;


use Illuminate\Database\Eloquent\Collection;

interface RemoveAllPostersContract
{
    public function remove(Collection $data): bool;
}
