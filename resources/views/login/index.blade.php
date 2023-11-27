@extends('layout.layout')

@section('title')
    <h1 class="mb-3 fs-2 text-center">Login dulu</h1>
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-signin w-100 m-auto">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}!!</strong> gas login cuy.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('fail'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('fail') }}!!</strong> Silahkan coba lagi.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            id="username" placeholder="Username" autofocus>
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                </form>
            </main>
        </div>
    </div>
@endsection
