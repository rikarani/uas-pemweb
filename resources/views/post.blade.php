@extends('layout.layout')

@section('content')
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>

            <p>By <a href="/posts?author={{ $post->author->username }}"
                    class="text-decoration-none">{{ $post->author->name }}</a> in <a
                    href="/posts?category={{ $post->category->slug }}"
                    class="text-decoration-none">{{ $post->category->name }}</a></p>

            @if ($post->image)
                <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->slug }}" alt=""
                    class="img-fluid">
            @endif

            <article class="my-3">
                {!! $post->body !!}
            </article>
        </div>
    </div>
@endsection
