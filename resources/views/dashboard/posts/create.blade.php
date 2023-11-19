@extends('dashboard.layout.layout')

@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Post Baru</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-8">
        <form action="/dashboard/posts" method="POST" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title') }}" required autofocus />
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug <span style="font-size: 11px">(Auto Generated)</span></label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug') }}" readonly required />
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar <span style="font-size: 11px">(Opsional)</span></label>
                <img id="preview" class="img-fluid d-block mb-3 col-lg-8">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="x" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="x"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Post</button>
        </form>
    </div>

    <script>
        const titleField = document.getElementById("title");
        const slugField = document.getElementById("slug");

        titleField.addEventListener("change", () => {
            fetch(`/dashboard/posts/generate?title=${titleField.value}`)
                .then((response) => response.json())
                .then((data) => slugField.value = data.slug);
        });

        document.addEventListener("trix-file-accept", (e) => {
            e.preventDefault();
        })

        function previewImage() {
            const inputImage = document.getElementById("image");
            const previewImage = document.getElementById("preview")

            const [file] = inputImage.files;
            if (file) {
                previewImage.src = URL.createObjectURL(file);
            }
        }
    </script>
@endsection
