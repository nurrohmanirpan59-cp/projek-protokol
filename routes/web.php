<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisiController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('divisi', DivisiController::class);
