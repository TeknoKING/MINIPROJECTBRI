@extends('kelas.layouts.main')

@section('container')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add classes</li>
        </ol>
    </nav>

    <div class="pb-3">
        <h1>Add classes</h1>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="/kelas/{{ $kelas->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Nama kelas</label>
                        <input type="text" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" class="form-control"
                            name="nama_kelas" id="nama_kelas" required>
                        @error('nama_kelas')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <input type="text" value="{{ old('fakultas', $kelas->fakultas) }}" class="form-control"
                            name="fakultas" id="fakultas" required>
                        @error('fakultas')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input value="{{ old('jurusan', $kelas->jurusan) }}" type="text" class="form-control"
                            name="jurusan" id="jurusan" required>
                        @error('jurusan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tingkat" class="form-label">Tingkat</label>
                        <input value="{{ old('tingkat', $kelas->tingkat) }}" type="text" class="form-control"
                            name="tingkat" id="tingkat" required>
                        @error('tingkat')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
