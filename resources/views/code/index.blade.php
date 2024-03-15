@extends('layouts.main')

@section('container')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Generate code</li>
        </ol>
    </nav>

    <div class="pb-3">
        <h1>Generate code</h1>
    </div>

    <a href="/codes/create" class="btn btn-primary btn-block mb-3">Generate new code</a>

    @if (session('newCode'))
        <div class="alert alert-success" role="alert">
            Code successfully granted: {{ session('newCode') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id user</th>
                <th scope="col">Code</th>
                <th scope="col">Id user get</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($codes as $code)
                <tr>
                    <td>{{ $code->id_user }}</td>
                    <td>{{ $code->code }}</td>
                    @if ($code->id_user_get == null)
                        <td>Belum dipakai</td>
                    @else
                        <td>Terpakai</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
