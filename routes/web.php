<?php

use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SkripsiController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('layout.home');
// });

// Dosen
Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
Route::get('/dosen/cari', [DosenController::class, 'cari']);
Route::get('/dosen/add', [DosenController::class, 'add']);
Route::post('/dosen/simpan', [DosenController::class, 'simpan']);
Route::get('/dosen/edit/{nip}', [DosenController::class, 'edit']);
Route::post('/dosen/update/{nip}', [DosenController::class, 'update']);
Route::get('/dosen/delete/{nip}', [DosenController::class, 'delete']);
Route::get('/dosen/detail/{nip}', [DosenController::class, 'detail']);

// Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
Route::get('/mahasiswa/add', [MahasiswaController::class, 'add']);
Route::get('/mahasiswa/cari', [MahasiswaController::class, 'cari']);
Route::post('/mahasiswa/simpan', [MahasiswaController::class, 'simpan']);
Route::get('/mahasiswa/edit/{nim}', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/update/{nim}', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/delete/{nim}', [MahasiswaController::class, 'delete']);
Route::get('/mahasiswa/detail/{nim}', [MahasiswaController::class, 'detail']);

// Bimbingan
Route::get('/bimbingan', [BimbinganController::class, 'index'])->name('bimbingan');
Route::get('/bimbingan/add', [BimbinganController::class, 'add']);
Route::get('/bimbingan/cari', [BimbinganController::class, 'cari']);
Route::post('/bimbingan/simpan', [BimbinganController::class, 'simpan']);
Route::get('/bimbingan/edit/{id_bimbingan}', [BimbinganController::class, 'edit']);
Route::post('/bimbingan/update/{id_bimbingan}', [BimbinganController::class, 'update']);
Route::get('/bimbingan/delete/{id_bimbingan}', [BimbinganController::class, 'delete']);

// Jadwal
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
Route::get('/jadwal/add', [JadwalController::class, 'add']);
Route::get('/jadwal/cari', [JadwalController::class, 'cari']);
Route::post('/jadwal/simpan', [JadwalController::class, 'simpan']);
Route::get('/jadwal/edit/{id_jadwal}', [JadwalController::class, 'edit']);
Route::post('/jadwal/update/{id_jadwal}', [JadwalController::class, 'update']);
Route::get('/jadwal/delete/{id_jadwal}', [JadwalController::class, 'delete']);
Route::get('/jadwal/detail/{id_jadwal}', [JadwalController::class, 'detail']);

// Skripsi
Route::get('/skripsi', [SkripsiController::class, 'index'])->name('skripsi');
Route::get('/skripsi/detail/{id_skirpsi}', [SkripsiController::class, 'detail']);
Route::get('/skripsi/add', [SkripsiController::class, 'add']);
Route::get('/skripsi/cari', [SkripsiController::class, 'cari']);
Route::post('/skripsi/simpan', [SkripsiController::class, 'simpan']);
Route::get('/skripsi/edit/{id_skirpsi}', [SkripsiController::class, 'edit']);
Route::post('/skripsi/update/{id_skirpsi}', [SkripsiController::class, 'update']);
Route::get('/skripsi/delete/{id_skirpsi}', [SkripsiController::class, 'delete']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
