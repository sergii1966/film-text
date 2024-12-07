<?php

namespace App\Http\Actions\Backend\Film;

use App\Contracts\Backend\Film\AddCategoryFilmContract;
use App\Models\Film;

class AddCategoryFilmAction implements AddCategoryFilmContract
{
    public function __construct(public ?string $relation)
    {

    }
    /**
     * @param array $data
     * @return Film|null
     */
    public function createOrUpdate(array $data): ?Film
    {
        $model = Film::where(['id' => $data['film_id']])->first();
        $model->{$this->relation}()->sync($data['category']);

        return $model;
    }
}
