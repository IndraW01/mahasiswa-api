<x-app-layout title="Mahasiswa Edit" breadcrumb="Mahasiswa" breadcrumbItem="Edit Mahasiswa">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Mahasiswa</p>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-warning btn-sm ms-auto">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.update', ['mahasiswa' => $mahasiswa]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Name</label>
                                    <input class="form-control @error('name')is-invalid @enderror " id="name"
                                        name="name" type="text" value="{{ old('name', $mahasiswa->User->name) }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">email</label>
                                    <input class="form-control @error('email')is-invalid @enderror " id="email"
                                        name="email" type="email" value="{{ old('email', $mahasiswa->User->email) }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="nim" class="form-control-label">nim</label>
                                    <input class="form-control @error('nim')is-invalid @enderror " id="nim" name="nim"
                                        type="text" value="{{ old('nim', $mahasiswa->nim) }}">
                                    @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jurusan_id" class="form-control-label">Jurusan</label>
                                    <select class="form-select" name="jurusan_id">
                                        @foreach ($jurusans as $jurusan)
                                        @if (old('jurusan_id', $mahasiswa->jurusan_id) == $jurusan->id)
                                        <option value="{{ $jurusan->id }}" selected>{{
                                            $jurusan->name }}
                                        </option>
                                        @else
                                        <option value="{{ $jurusan->id }}">{{
                                            $jurusan->name }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('jurusan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                    <select class="form-select" name="jenis_kelamin">
                                        <option value="Laki-Laki" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) ==
                                            'Laki-Laki' ? 'selected' : '' }}>
                                            Laki-Laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) ==
                                            'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
