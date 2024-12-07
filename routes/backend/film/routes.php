<?php

use App\Http\Controllers\Backend\Film\AddCategoryFilmController;
use App\Http\Controllers\Backend\Film\AddFilmController;
use App\Http\Controllers\Backend\Film\AddNameFilmController;
use App\Http\Controllers\Backend\Film\AddStatusFilmController;
use App\Http\Controllers\Backend\Film\AllFilmsController;
use App\Http\Controllers\Backend\Film\EditFilmController;
use App\Http\Controllers\Backend\Film\OneFilmController;
use Illuminate\Support\Facades\Route;


Route::get('/', AllFilmsController::class)->name('main-backend');
Route::get('/one-film/{id}', OneFilmController::class)->name('one-film-backend');
Route::get('/add-film', AddFilmController::class)->name('add-film-backend');
Route::get('/edit-film/{id}', EditFilmController::class)->name('edit-film-backend');
Route::post('/add-name-film', AddNameFilmController::class)->name(
    'add-name-film-backend'
);
Route::post('/add-status-film', AddStatusFilmController::class)->name('add-status-film-backend');
Route::post('/add-category-film', AddCategoryFilmController::class)->name('add-category-film-backend');
