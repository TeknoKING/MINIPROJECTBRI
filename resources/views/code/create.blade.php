@extends('code.layouts.main')

@section('container')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="/codes">Code list</a></li>
            <li class="breadcrumb-item active" aria-current="page">Generate code</li>
        </ol>
    </nav>

    <div class="pb-3">
        <h1>Generate code</h1>
    </div>

    <form action="/codes" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Generate</button>
    </form>
@endsection
