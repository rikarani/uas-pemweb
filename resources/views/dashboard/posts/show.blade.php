@extends('dashboard.layout.layout')

@section('content')
    <div>
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <a href="/dashboard/posts" class="btn btn-success"><i class="bi bi-arrow-left"></i> Kembali ke Postingan
                    Saya</a>
                <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit Postingan</a>
                <a href="" class="btn btn-danger"><i class="bi bi-x-circle"></i> Hapus Postingan</a>

                <img src="https://source.unsplash.com/1200x400?{{ $post->category->slug }}" alt=""
                    class="img-fluid mt-3">

                <article class="my-3">
                    {!! $post->body !!}
                </article>

                <a href="/posts" class="text-decoration-none">Kembali Ke Halaman Blog</a>
            </div>
        </div>
    </div>
@endsection
