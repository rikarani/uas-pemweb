@extends('dashboard.layout.layout')

@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kategori Baru</h1>
    </div>
@endsection

@section('content')
    <div class="col-lg-6">
        <form action="/dashboard/categories" method="POST" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required autofocus />
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug <span style="font-size: 11px">(Auto Generated)</span></label>
                <input type="text" class="form-control" id="slug" name="slug" readonly />
            </div>
            <button type="submit" class="btn btn-primary">Tambah Kategori</button>
        </form>
    </div>

    <script>
        const categoryName = document.getElementById("name");
        const categorySlug = document.getElementById("slug");

        categoryName.addEventListener("change", () => {
            fetch(`/dashboard/categories/generate?name=${categoryName.value}`)
                .then((response) => response.json())
                .then((data) => (categorySlug.value = data.slug));
        });
    </script>
@endsection
