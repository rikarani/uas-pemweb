@extends('dashboard.layout.layout')

@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Materi</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-6">
        <a href="/dashboard/materi/create" class="btn btn-primary mb-3">Tambah Materi Baru</a>

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
                    <th scope="col">Nama Materi</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lesson->name }}</td>
                        <td>{{ $lesson->course->name }}</td>
                        <td>
                            <a href="/dashboard/materi/{{ $lesson->id }}/edit" class="btn btn-warning"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="/dashboard/materi/{{ $lesson->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Materi?')"><i
                                        class="bi bi-x-circle"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
