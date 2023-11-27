@extends('layout.layout')

@section('title')
    <h1>Repository</h1>
@endsection

@section('content')
    <form action="/course" class="mt-3">
        <div class="col-lg-3 d-flex align-items-center gap-2">
            <label>Semester</label>
            <select name="semester" class="form-select">
                <option value="" selected disabled>---</option>
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

    <div class="mt-3 mb-3">
        <div class="row row-gap-4">
            @foreach ($lessons as $lesson)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('img/ex.jpg') }}" style="max-height: 150px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lesson->name }}</h5>
                            <p class="card-text">{{ $lesson->description }}</p>
                            <a href="/course/{{ $lesson->slug }}" class="btn btn-primary">Lihat Materi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
