@extends('dashboard.layout.layout')

@section('header')
    <h1 class="h2">Tambah Post Baru</h1>
@endsection

@section('content')
    <div class="col-lg-8">
        <form action="/dashboard/posts" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" />
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug <span style="font-size: 12px">(Auto Generated)</span></label>
                <input type="text" class="form-control" id="slug" name="slug" readonly disabled />
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input id="x" type="hidden" name="body">
                <trix-editor input="x"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Post</button>
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
