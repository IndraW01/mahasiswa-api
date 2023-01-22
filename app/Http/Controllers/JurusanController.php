<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jurusan.index', [
            'jurusans' => Jurusan::query()->latest()->orderBy('name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateJurusan = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'kaprodi' => 'required',
            'kuota' => 'required',
        ]);

        Jurusan::create($validateJurusan);

        Alert::success('Berhasil', "Berhasil Menambah Jurusan");
        return redirect()->route('jurusan.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', [
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $validateJurusan = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'kaprodi' => 'required',
            'kuota' => 'required',
        ]);

        $jurusan->update($validateJurusan);

        Alert::success('Berhasil', "Berhasil Mengubah Jurusan");
        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        Alert::success('Berhasil', "Berhasil Menghapus Jurusan");
        return redirect()->route('jurusan.index');
    }

    public function slug(Request $request)
    {
        return response()->json(Str::slug($request->name));
    }
}
