<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OuvrageController;

Route::get('/', function () {
    return redirect()->route('ouvrages.index');
});

Route::resource('ouvrages', OuvrageController::class);