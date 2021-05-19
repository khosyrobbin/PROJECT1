<?php

use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SkripsiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout.home');
});

// Dosen
Route::get('/dosen', [DosenController::class, 'index']);
// Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
// Bimbingan
Route::get('/bimbingan', [BimbinganController::class, 'index']);
// Jadwal
Route::get('/jadwal', [JadwalController::class, 'index']);
// Skripsi
Route::get('/skripsi', [SkripsiController::class, 'index']);
