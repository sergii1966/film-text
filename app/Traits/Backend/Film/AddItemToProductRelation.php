<?php

namespace App\Traits\Backend\Film;

use App\Models\Film;

trait AddItemToProductRelation
{
    public function __construct(public ?string $relation)
    {

    }

    /**
     * @param array $data
     * @return Film|bool
     */
    public function add(array $data): Film|bool
    {
        $model = Film::query()->where(['id' => $data['film_id']])->first();

        if($model && $model->{$this->relation}()->create($data)){
            return $model;
        }

        return false;
    }
}
