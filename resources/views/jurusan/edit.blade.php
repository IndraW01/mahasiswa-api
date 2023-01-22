<x-app-layout title="Jurusan Edit" breadcrumb="Jurusan" breadcrumbItem="Edit Jurusan">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Jurusan</p>
                        <a href="{{ route('jurusan.index') }}" class="btn btn-warning btn-sm ms-auto">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('jurusan.update', ['jurusan' => $jurusan]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Name</label>
                                    <input class="form-control @error('name')is-invalid @enderror " id="name"
                                        name="name" type="text" value="{{ old('name', $jurusan->name) }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug" class="form-control-label">Slug</label>
                                    <input class="form-control @error('slug')is-invalid @enderror " id="slug"
                                        name="slug" type="text" value="{{ old('slug', $jurusan->slug) }}" readonly>
                                    @error('slug')
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
                                    <label for="kaprodi" class="form-control-label">Kaprodi</label>
                                    <input class="form-control @error('kaprodi')is-invalid @enderror " id="kaprodi"
                                        name="kaprodi" type="text" value="{{ old('kaprodi', $jurusan->kaprodi) }}">
                                    @error('kaprodi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kuota" class="form-control-label">Kuota</label>
                                    <input class="form-control @error('kuota')is-invalid @enderror " id="kuota"
                                        name="kuota" type="text" value="{{ old('kuota', $jurusan->kuota) }}">
                                    @error('kuota')
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

    @push('costum-js')
    <script>
        const name = document.querySelector('#name');
        const slug = document.getElementById('slug');

        name.addEventListener('change', async function() {
            const slugString = await getSlug();

            slug.value = slugString;
        });

        const getSlug = async () => {
            return await fetch("{{ route('jurusan.slug') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    "name": name.value
                })
            })
                .then((response) => response.json());
        };

    </script>
    @endpush
</x-app-layout>
