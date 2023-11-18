@extends('dashboard.layout.layout')

@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-8">
        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $post->title) }}" required autofocus />
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug <span style="font-size: 11px">(Auto Generated)</span></label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug', $post->slug) }}" readonly required />
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
                        @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="x" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="x"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>

    <script>
        const titleField = document.getElementById("title");
        const slugField = document.getElementById("slug");

        titleField.addEventListener("change", () => {
            fetch(`/dashboard/posts/generateSlug?title=${titleField.value}`)
                .then((response) => response.json())
                .then((data) => slugField.value = data.slug);
        });

        document.addEventListener("trix-file-accept", (e) => {
            e.preventDefault();
        })
    </script>
@endsection
