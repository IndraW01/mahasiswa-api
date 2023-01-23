<x-app-layout title="Dashboard Admin Penel">
    @php
    $mahasiswaCount = $mahasiswas->count();
    $mahasiswaLakiCount = $mahasiswas->filter(function($mahasiswa, $key) {
    return $mahasiswa->jenis_kelamin === 'Laki-Laki';
    })->count();
    $mahasiswaPerempuanCount = $mahasiswas->filter(function($mahasiswa, $key) {
    return $mahasiswa->jenis_kelamin === 'Perempuan';
    })->count();
    @endphp
    <div class="row">
        <x-card-dashboard class="bg-gradient-primary shadow-primary" title="Mahasiswa" :count=$mahasiswaCount
            icon="ni-money-coins" />
        <x-card-dashboard class="bg-gradient-danger shadow-danger" title="Jurusan" :count=$jurusanCount
            icon="ni-world" />
        <x-card-dashboard class="bg-gradient-success shadow-success" title="Laki-Laki" :count=$mahasiswaLakiCount
            icon="ni-paper-diploma" />
        <x-card-dashboard class="bg-gradient-warning shadow-warning" title="Perempuan" :count=$mahasiswaPerempuanCount
            icon="ni-cart" />
    </div>
</x-app-layout>
