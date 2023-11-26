@extends('dashboard.layout.layout')

@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Semua User</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-8">
        <a href="/dashboard/users/create" class="btn btn-primary mb-3">Tambah User Baru</a>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="table-responsive small col-lg-8">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipe User</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin ? 'Admin' : 'Biasa' }}</td>
                        <td class="d-flex gap-2">
                            <a href="/dashboard/users/{{ $user->username }}/edit" class="btn btn-warning"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="/dashboard/users/{{ $user->username }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus User?')"><i
                                        class="bi bi-x-circle"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
