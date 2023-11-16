@extends('layout.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Daftar dulu woy</h1>

                <form>
                    <div class="form-floating">
                        <input type="text" class="form-control rounded-top" name="name" id="name" placeholder="Name">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom" name="password" id="password"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>

                    <button class="btn btn-primary w-100 py-2" type="submit">Daftar</button>
                </form>

                <small class="d-block text-center mt-3">Dah Punya Akun? <a href="/login">gas login!!!!</a></small>
            </main>
        </div>
    </div>
@endsection
