@extends('layout')

@section('content')
    <h1 class="mb-3">{{ $title }}</h1>

    <div>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/500x400?{{ $category->slug }}" class="card-img-top"
                            alt="..." style="height: 12rem">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">Ada {{ $category->post->count() }} Postingan</p>

                            <a href="/posts?category={{ $category->slug }}" class="btn btn-primary">Lihat Post</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
