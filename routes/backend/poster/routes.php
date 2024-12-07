<?php

use App\Http\Controllers\Backend\Poster\AddPosterController;
use App\Http\Controllers\Backend\Poster\DelPosterController;
use App\Http\Controllers\Backend\Poster\EditPosterController;
use Illuminate\Support\Facades\Route;


Route::post('/add-poster-film', AddPosterController::class)->name('add-poster-film-backend');

Route::post('/edit-poster-film', EditPosterController::class)
    ->name('edit-poster-film-backend');

Route::post('/del-poster-film', DelPosterController::class)
    ->name('del-poster-film-backend');
