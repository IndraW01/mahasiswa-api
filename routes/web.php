<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('/mahasiswa', MahasiswaController::class)->names('mahasiswa')->scoped(['mahasiswa' => 'nim'])->except('show');

Route::post('/jurusan/slug', [JurusanController::class, 'slug'])->name('jurusan.slug');
Route::resource('/jurusan', JurusanController::class)->names('jurusan')->scoped(['jurusan' => 'slug'])->except('show');

require __DIR__ . '/auth.php';
