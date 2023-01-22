<x-app-layout title="Mahasiswa Tambah" breadcrumb="Mahasiswa" breadcrumbItem="Tambah Mahasiswa">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah Mahasiswa</p>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-warning btn-sm ms-auto">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Name</label>
                                    <input class="form-control @error('name')is-invalid @enderror " id="name"
                                        name="name" type="text" value="{{ old('name') }}">
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
                                        name="email" type="email" value="{{ old('email') }}">
                                    @error('email')
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
                                    <label for="password" class="form-control-label">password</label>
                                    <input class="form-control @error('password')is-invalid @enderror " id="password"
                                        name="password" type="password" value="{{ old('password') }}">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nim" class="form-control-label">nim</label>
                                    <input class="form-control @error('nim')is-invalid @enderror " id="nim" name="nim"
                                        type="text" value="{{ old('nim') }}">
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
                                        <option value="{{ $jurusan->id }}">{{
                                            $jurusan->name }}
                                        </option>
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
                                        <option value="Laki-Laki">
                                            Laki-Laki</option>
                                        <option value="Perempuan">
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
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>