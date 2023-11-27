@extends('dashboard.layout.layout')

@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-6">
        <form action="/dashboard/course/{{ $course->slug }}" method="POST" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $course->name) }}" required autofocus />
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug <span style="font-size: 11px">(Auto Generated)</span></label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug', $course->slug) }}" required />
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" value="{{ old('description', $course->description) }}" required />
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="number" class="form-control @error('semester') is-invalid @enderror" id="semester"
                    name="semester" value="{{ old('semester', $course->semester) }}" required />
                @error('semester')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit Mata Kuliah</button>
        </form>
    </div>

    <script>
        const titleField = document.getElementById("name");
        const slugField = document.getElementById("slug");

        titleField.addEventListener("change", () => {
            fetch(`/dashboard/course/generate?course=${titleField.value}`)
                .then((response) => response.json())
                .then((data) => slugField.value = data.slug);
        });
    </script>
@endsection
