<?php

use App\Http\Controllers\MedalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/medals', MedalController::class)->name('medals');
