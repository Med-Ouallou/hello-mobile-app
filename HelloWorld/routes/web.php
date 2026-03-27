<?php

use App\Http\Controllers\CountriesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/countries', [CountriesController::class, 'index']);
