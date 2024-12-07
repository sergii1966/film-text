<?php

namespace App\Traits\Backend\Film;

use App\Models\Film;

trait CreateOrUpdateItemProductRelation
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
        $model = Film::query()->where(['id' => $data['film_id']])->first();
        if($model && $model->{$this->relation}()->updateOrCreate(['id' => $data['id'] ?? Null], $data)){
            return $model;
        }

        return null;
    }
}
