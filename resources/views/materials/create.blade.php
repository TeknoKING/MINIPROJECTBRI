@extends('code.layouts.main')

@section('container')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="/materials">Materials list</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add material</li>
        </ol>
    </nav>

    <div class="pb-3">
        <h1>Add material</h1>
    </div>

    <form action="/materials" method="POST">
        @csrf
        <div class="mb-3">
            <label for="materi" class="form-label">Material name</label>
            <input type="text" class="form-control" name="materi" id="materi" value="{{ old('materi') }}"
                required>
            @error('materi')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
