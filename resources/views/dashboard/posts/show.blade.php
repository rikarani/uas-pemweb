@extends('dashboard.layout.layout')

@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $post->title }}</h1>
    </div>
@endsection

@section('content')
    <div>
        <div class="row my-3">
            <div class="col-lg-8">

                <a href="/dashboard/posts" class="btn btn-success"><i class="bi bi-arrow-left"></i> Kembali ke Postingan
                    Saya</a>
                <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit Postingan</a>
                <a href="" class="btn btn-danger"><i class="bi bi-x-circle"></i> Hapus Postingan</a>

                <img src="https://source.unsplash.com/1200x400?{{ $post->category->slug }}" alt=""
                    class="img-fluid mt-3">

                <article class="my-3">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection
