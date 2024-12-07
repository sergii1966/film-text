<?php

namespace App\Api\V1\Resources;

use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OneFilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'poster' => new PosterResource($this->poster),
            'categories' => new CategoryResourceCollection($this->categories),
            'noimg_sm' => Poster::$no_image_sm ?? null,
            'noimg_lg' => Poster::$no_image_lg ?? null,
        ];
    }
}
