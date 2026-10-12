<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('divisi', DivisiController::class);
Route::resource('pegawai', PegawaiController::class);