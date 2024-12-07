<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'admin'
    ],
    function () {
        require 'film/routes.php';
        require 'poster/routes.php';
    }
);
