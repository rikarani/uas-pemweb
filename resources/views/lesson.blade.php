@extends('layout.layout')

@section('title')
    <h1>{{ $course->name }}</h1>
@endsection

@section('content')
    <form action="/repo" class="mt-3">
        <div class="col-lg-3 d-flex align-items-center gap-2">
            <label>Semester</label>
            <select name="semester" class="form-select">
                @for ($i = 1; $i <= 8; $i++)
                    @if (request('semester') == $i)
                        <option value="{{ $i }}" selected>{{ $i }}</option>
                    @else
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endif
                @endfor
            </select>
            <button type="submit" class="btn btn-primary">Lihat</button>
        </div>
    </form>

    <div class="mt-3">
        <div class="row row-gap-3">
            @foreach ($course->lesson as $lesson)
                <div class="col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.5)">
                            <a href="#" class="text-decoration-none text-white">Pertemuan {{ $loop->iteration }}</a>
                        </div>
                        <img src="{{ asset('storage/post-images/ex.jpg') }}" style="max-height: 150px" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lesson->name }}</h5>
                            <p class="card-text">{{ $lesson->description }}</p>
                            <a href="/repo/{{ $lesson->slug }}" class="btn btn-primary">Download Materi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
