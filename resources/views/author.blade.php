@extends('layout')

@section('content')
    <h1 class="mb-3">Postingan dari {{ $author->name }}</h1>

    {{-- Latest Post --}}
    @if ($author->post->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $author->post[0]->category->slug }}" class="card-img-top"
                alt="Text" />
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/posts/{{ $author->post[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $author->post[0]->title }}</a>
                </h3>
                <small class="text-body-secondary">
                    <p>By <a href="" class="text-decoration-none">{{ $author->post[0]->author->name }}</a> in <a
                            href="/category/{{ $author->post[0]->category->slug }}"
                            class="text-decoration-none">{{ $author->post[0]->category->name }}</a>
                        {{ $author->post[0]->created_at->diffForHumans() }}</p>
                </small>
                <p class="card-text">{{ $author->post[0]->excerpt }}</p>
                <a href="/posts/{{ $author->post[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post Found</p>
    @endif
    {{-- Latest Post --}}
@endsection
