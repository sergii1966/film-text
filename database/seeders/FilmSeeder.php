<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Film;
use App\Models\Poster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->count(10)->create();

        Film::factory()->count(50)
            ->create()
            ->each(function (Film $film) {
                $image = Poster::factory()->count(1)->make();
                $film->poster()->saveMany($image);
            });

        foreach (Film::all() as $item) {
            $item->categories()->sync([rand(1, 10), rand(1, 10)]);
        }
    }
}
