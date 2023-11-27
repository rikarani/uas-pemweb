@extends('layout.layout')

@section('title')
    <h1>{{ $course->name }}</h1>
@endsection

@section('content')
    <div class="mt-3">
        <div class="row row-gap-3">
            @foreach ($course->lesson as $lesson)
                <div class="col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.5)">
                            <a href="#" class="text-decoration-none text-white">Pertemuan {{ $loop->iteration }}</a>
                        </div>
                        <img src="https://source.unsplash.com/500x500?{{ $lesson->course->slug }}" style="max-height: 150px"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lesson->name }}</h5>
                            <p class="card-text">{{ $lesson->description }}</p>
                            <a href="/course/{{ $lesson->id }}/download" class="btn btn-primary">Download Materi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
