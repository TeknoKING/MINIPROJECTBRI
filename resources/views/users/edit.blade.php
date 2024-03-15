@extends('users.layouts.main')
@section('container')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add user</li>
        </ol>
    </nav>


    <div class="pb-3">
        <h1>Add user</h1>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="/users/{{ $user->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            value="{{ old('username', $user->username) }}" required>
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <select class="form-select mb-2" name="role" id="role" aria-label="Default select example"
                        required>
                        <option value="Admin">Admin</option>
                        <option value="Staff">Staff</option>
                        <option value="PJ">PJ</option>
                        <option value="Assistant">Assistant</option>
                    </select>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
