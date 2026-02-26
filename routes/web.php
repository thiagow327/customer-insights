<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsightController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('insights', InsightController::class);
