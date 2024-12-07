<?php

namespace App\Http\Actions\Backend\Film;

use App\Contracts\Backend\Film\AddStatusFilmContract;
use App\Models\Film;

class AddStatusFilmAction implements AddStatusFilmContract
{
    /**
     * @param array $data
     * @return Film|null
     */
    public function createOrUpdate(array $data): ?Film
    {
        $model = Film::query()->where(['id' => $data['film_id']])->first();
        if($model && $model->updateOrCreate(['id' => $data['film_id'] ?? Null], $data)){
            return $model;
        }

        return null;
    }
}
