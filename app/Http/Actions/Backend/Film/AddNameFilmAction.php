<?php

namespace App\Http\Actions\Backend\Film;

use App\Contracts\Backend\Film\AddNameFilmContract;
use App\Models\Film;

class AddNameFilmAction implements AddNameFilmContract
{
    /**
     * @param array $data
     * @return Film|null
     */
    public function createOrUpdate(array $data): ?Film
    {
        return Film::query()->updateOrCreate(['id' => $data['id'] ?? null], $data);
    }
}
