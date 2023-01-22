<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index', [
            'userMahasiswas' => User::query()->with(['Mahasiswa', 'Mahasiswa.Jurusan'])->latest()->orderBy('name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create', [
            'jurusans' => Jurusan::query()->get(['name', 'id']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateMahasiswa = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'nim' => 'required',
            'jurusan_id' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->Mahasiswa()->create([
            'nim' => $request->nim,
            'jurusan_id' => $request->jurusan_id,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        Alert::success('Berhasil', "Berhasil Menambah Mahasiswa");
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', [
            'mahasiswa' => $mahasiswa,
            'jurusans' => Jurusan::query()->get(['name', 'id']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validateMahasiswa = $request->validate([
            'name' => 'required',
            'email' => 'required|email|' . Rule::unique('users', 'email')->ignore($mahasiswa->user_id),
            'nim' => 'required|' . Rule::unique('mahasiswas', 'nim')->ignore($mahasiswa->id),
            'jurusan_id' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $mahasiswa->User()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $mahasiswa->update([
            'nim' => $request->nim,
            'jurusan_id' => $request->jurusan_id,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        Alert::success('Berhasil', "Berhasil Mengubah Mahasiswa");
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        Alert::success('Berhasil', "Berhasil Menghapus Mahasiswa");
        return redirect()->route('mahasiswa.index');
    }
}
