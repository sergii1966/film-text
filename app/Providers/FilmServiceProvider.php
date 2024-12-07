<?php

namespace App\Providers;

use App\Contracts\Backend\Film\AddCategoryFilmContract;
use App\Contracts\Backend\Film\AddNameFilmContract;
use App\Contracts\Backend\Film\AddStatusFilmContract;
use App\Contracts\Backend\Film\ValidateAddCategoryFilmContract;
use App\Contracts\Backend\Film\ValidateAddNameFilmContract;
use App\Contracts\Backend\Film\ValidateAddStatusFilmContract;
use App\Http\Actions\Backend\Film\AddCategoryFilmAction;
use App\Http\Actions\Backend\Film\AddNameFilmAction;
use App\Http\Actions\Backend\Film\AddStatusFilmAction;
use App\Http\Actions\Backend\Film\ValidateAddCategoryFilmAction;
use App\Http\Actions\Backend\Film\ValidateAddNameFilmAction;
use App\Http\Actions\Backend\Film\ValidateAddStatusFilmAction;
use Illuminate\Support\ServiceProvider;

class FilmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AddNameFilmContract::class, AddNameFilmAction::class);
        $this->app->bind(ValidateAddNameFilmContract::class, ValidateAddNameFilmAction::class);

        $this->app->bind(AddStatusFilmContract::class, AddStatusFilmAction::class);
        $this->app->bind(ValidateAddStatusFilmContract::class, ValidateAddStatusFilmAction::class);

        $this->app->bind(AddCategoryFilmContract::class, function (){
            return new AddCategoryFilmAction('categories');
        });

        $this->app->bind(ValidateAddCategoryFilmContract::class, ValidateAddCategoryFilmAction::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
