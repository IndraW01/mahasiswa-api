<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MahasiswaResource::collection(Mahasiswa::query()->with(['user', 'jurusan'])->get())->additional([
            'status' => 'OK',
            'message' => 'Get All Mahasiswa'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return (new MahasiswaResource(Mahasiswa::findOrFail($id)))->additional([
            'status' => 'OK',
            'message' => 'Get Detail Mahasiswa',
        ]);
    }
}
