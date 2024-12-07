<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poster>
 */
class PosterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url_sm' => $this->faker->imageUrl(380, 380),
            'path_sm' => $this->faker->text(5),
            'width_sm' => 380,
            'height_sm' => 380,
            'url_lg' => $this->faker->imageUrl(600, 600),
            'path_lg' => $this->faker->text(5),
            'width_lg' => 600,
            'height_lg' => 600,
            'status' => 1,
        ];
    }
}
