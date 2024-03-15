@extends('layouts.main')

@section('container')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Materials</li>
        </ol>
    </nav>

    <div class="pb-3">
        <h1>Materials</h1>
    </div>

    <a href="/materials/create" class="btn btn-primary btn-block mb-3">Add Materials</a>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Materials name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materials as $material)
                <tr>
                    <td>{{ $material->materi }}</td>
                    <td>
                        <form action="/materials/{{ $material->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <a href="/materials/{{ $material->id }}/edit" class="btn btn-secondary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
