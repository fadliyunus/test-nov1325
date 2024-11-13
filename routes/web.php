<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\mataPelajaranController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('guru', GuruController::class)->names('guru');

Route::resource('mapel', mataPelajaranController::class)->names('mapel');

Route::resource('siswa', SiswaController::class)->names('siswa');


Route::resource('kelas', KelasController::class)->names('kelas');
Route::resource('jadwal', JadwalController::class)->names('jadwal');
