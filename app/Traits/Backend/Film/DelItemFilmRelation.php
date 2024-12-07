<?php

namespace App\Traits\Backend\Film;

use App\Models\Film;

trait DelItemFilmRelation
{
    public function __construct(public ?string $relation)
    {

    }

    /**
     * @param array $data
     * @return Film|null
     */
    public function del(array $data): ?Film
    {
        $model = Film::query()->where(['id' => $data['film_id']])->first();

        if($model && $model->{$this->relation}()->where('id', $data['id'])->delete()){
            return $model;
        }

        return null;
    }
}
