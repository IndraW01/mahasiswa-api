<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'mahasiswas' => Mahasiswa::query()->get(),
            'jurusanCount' => Jurusan::query()->get()->count(),
        ]);
    }
}
