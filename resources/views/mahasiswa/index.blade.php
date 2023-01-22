<x-app-layout title="Mahasiswa All" breadcrumb="Mahasiswa" breadcrumbItem=Mahasiswa>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>All Mahasiswa</h6>
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Mahasiswa
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jurusan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jenis Kelamin</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userMahasiswas as $userMahasiswa)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $userMahasiswa->name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{
                                                    $userMahasiswa->email }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{
                                            $userMahasiswa->Mahasiswa->Jurusan->name }}</p>
                                        <p class="text-xs text-secondary mb-0">{{ $userMahasiswa->Mahasiswa->nim }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">{{
                                            $userMahasiswa->Mahasiswa->jenis_kelamin }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('mahasiswa.edit', ['mahasiswa' => $userMahasiswa->Mahasiswa->nim]) }}"
                                            class="btn btn-warning btn-sm text-white font-weight-bold text-xs"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('mahasiswa.destroy', ['mahasiswa' => $userMahasiswa->Mahasiswa->nim]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm text-white font-weight-bold text-xs">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
