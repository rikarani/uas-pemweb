@extends('layout')

@section('content')
    <h1 class="mb-3">{{ $title }}</h1>

    {{-- Latest Post --}}
    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->slug }}" class="card-img-top"
                alt="Text" />
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
                </h3>
                <small class="text-body-secondary">
                    <p>By <a href="/posts/author/{{ $posts[0]->author->username }}"
                            class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a
                            href="/posts/category/{{ $posts[0]->category->slug }}"
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}</p>
                </small>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post Found</p>
    @endif
    {{-- Latest Post --}}

    {{-- Remaining Post --}}
    <div>
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.5)">
                            <a href="/posts/category/{{ $post->category->slug }}"
                                class="text-decoration-none text-white">{{ $post->category->name }}</a>
                        </div>
                        <img src="https://source.unsplash.com/500x400?{{ $post->category->slug }}" class="card-img-top"
                            alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <small class="text-body-secondary">
                                <p>By <a href="/posts/author/{{ $post->author->username }}"
                                        class="text-decoration-none">{{ $post->author->name }}</a>
                                    {{ $post->created_at->diffForHumans() }}</p>
                            </small>
                            <p class="card-text">{{ $post->excerpt }}
                            </p>
                            <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Remaining Post --}}
@endsection