@extends('dashboard.layout.layout')

@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Materi Baru</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-6">
        <form action="/dashboard/materi" method="POST" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Judul</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" autofocus />
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" value="{{ old('description') }}" />
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="course" class="form-label">Mata Kuliah</label>
                <select name="course_id" class="form-select">
                    <option selected disabled>---</option>
                    @foreach ($courses as $group => $course)
                        <optgroup label="Semester {{ $group }}">
                            @foreach ($course as $c)
                                @if (old('course_id') == $c->id)
                                    <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                @else
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Kasih File laa</label>
                <input class="form-control @error('attachment') is-invalid @enderror" type="file" id="formFile"
                    name="materi">
                @error('materi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Materi</button>
        </form>
    </div>
@endsection
