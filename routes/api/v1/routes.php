<?php

use App\Api\V1\Controllers\Category\CategoryController;
use App\Api\V1\Controllers\Category\OneCategoryController;
use App\Api\V1\Controllers\Film\AllFilmsController;
use App\Api\V1\Controllers\Film\OneFilmController;
use Illuminate\Support\Facades\Route;

Route::get('/api/v1/films', AllFilmsController::class)->name('api-v1-films');
Route::get('/api/v1/films/{id}', OneFilmController::class)->name('api-v1-film');

Route::get('/api/v1/categories', CategoryController::class)->name('api-v1-categories');
Route::get('/api/v1/categories/{id}', OneCategoryController::class)->name('api-v1-films-category');

