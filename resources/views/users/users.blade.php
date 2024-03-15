@extends('layouts.main')

@section('container')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>

    <div class="pb-3">
        <h1>Users</h1>

    </div>

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

    <a href="/users/create" class="btn btn-primary btn-block mb-3">Add User</a>



    <table class="table">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Join date</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->join_date->toDateString() }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="/users/{{ $user->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <a href="/users/{{ $user->id }}/edit" class="btn btn-secondary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
