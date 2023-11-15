@extends('layout')

@section('content')
    <div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>

                <p>By <a href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in <a
                        href="/posts?category={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a></p>

                <img src="https://source.unsplash.com/1200x400?{{ $post->category->slug }}" alt="" class="img-fluid">

                <article class="my-3">
                    {!! $post->body !!}
                </article>

                <a href="/posts" class="text-decoration-none">Kembali Ke Halaman Blog</a>
            </div>
        </div>
    </div>
@endsection
