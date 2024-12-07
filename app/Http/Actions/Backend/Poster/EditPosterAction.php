<?php

namespace App\Http\Actions\Backend\Poster;

use App\Contracts\Backend\Poster\EditPosterContract;
use App\Models\Film;


class EditPosterAction implements EditPosterContract
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
        $model = Film::where(['id' => $data['film_id']])->with($this->relation)->first();
        $model->{$this->relation}()->updateOrCreate(['id' => $data['id'] ?? Null], $data);

        return $model;
    }
}
