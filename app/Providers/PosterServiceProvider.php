<?php

namespace App\Providers;

use App\Contracts\Backend\Poster\AddPosterContract;
use App\Contracts\Backend\Poster\DelPosterContract;
use App\Contracts\Backend\Poster\EditPosterContract;
use App\Contracts\Backend\Poster\RemoveAllPostersContract;
use App\Contracts\Backend\Poster\RemovePosterContract;
use App\Contracts\Backend\Poster\ValidateAddPosterContract;
use App\Contracts\Backend\Poster\ValidateDelPosterContract;
use App\Contracts\Backend\Poster\ValidateEditPosterContract;
use App\Http\Actions\Backend\Poster\AddPosterAction;
use App\Http\Actions\Backend\Poster\DelPosterAction;
use App\Http\Actions\Backend\Poster\EditPosterAction;
use App\Http\Actions\Backend\Poster\RemoveAllPostersAction;
use App\Http\Actions\Backend\Poster\RemovePosterAction;
use App\Http\Actions\Backend\Poster\ValidateAddPosterAction;
use App\Http\Actions\Backend\Poster\ValidateDelPosterAction;
use App\Http\Actions\Backend\Poster\ValidateEditPosterAction;
use Illuminate\Support\ServiceProvider;

class PosterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AddPosterContract::class, AddPosterAction::class);

        $this->app->bind(EditPosterContract::class, function (){
            return new EditPosterAction('poster');
        });

        $this->app->bind(ValidateAddPosterContract::class, ValidateAddPosterAction::class);

        $this->app->bind(DelPosterContract::class, function (){
            return new DelPosterAction('poster');
        });

        $this->app->bind(RemovePosterContract::class, RemovePosterAction::class);
        $this->app->bind(RemoveAllPostersContract::class, RemoveAllPostersAction::class);
        $this->app->bind(ValidateEditPosterContract::class, ValidateEditPosterAction::class);
        $this->app->bind(ValidateDelPosterContract::class, ValidateDelPosterAction::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
