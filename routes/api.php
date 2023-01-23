<?php

use App\Http\Controllers\Api\JurusanController;
use App\Http\Controllers\Api\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/mahasiswa', MahasiswaController::class)->only(['index', 'show']);
Route::apiResource('/jurusan', JurusanController::class)->only(['index', 'show']);
