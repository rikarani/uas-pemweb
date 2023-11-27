@extends('dashboard.layout.layout')

@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Materi</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-8">
        <a href="/dashboard/materi/create" class="btn btn-primary mb-3">Tambah Materi Baru</a>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="mb-3">
        <form action="/dashboard/materi" class="d-flex col-lg-4 gap-3">
            <select class="form-select" name="course">
                <option selected disabled>---</option>
                @foreach ($courses as $group => $course)
                    <optgroup label="Semester {{ $group }}">
                        @foreach ($course as $c)
                            @if (request('course') == $c->slug)
                                <option value="{{ $c->slug }}" selected>{{ $c->name }}</option>
                            @else
                                <option value="{{ $c->slug }}">{{ $c->name }}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            <button class="btn btn-primary" type="submit">Lihat</button>
        </form>
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
