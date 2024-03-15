@extends('layouts.main')

@section('container')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Classes</li>
        </ol>
    </nav>

    <div class="pb-3">
        <h1>Classes</h1>
    </div>

    <a href="/kelas/create" class="btn btn-primary btn-block mb-3">Add Classes</a>

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
                <th scope="col">Nama kelas</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Tingkat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelass as $kelas)
                <tr>
                    <td>{{ $kelas->nama_kelas }}</td>
                    <td>{{ $kelas->fakultas }}</td>
                    <td>{{ $kelas->jurusan }}</td>
                    <td>{{ $kelas->tingkat }}</td>
                    <td>
                        <form action="/kelas/{{ $kelas->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <a href="/kelas/{{ $kelas->id }}/edit" type="submit" class="btn btn-secondary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
