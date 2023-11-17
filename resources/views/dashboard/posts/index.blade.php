@extends('dashboard.layout.layout')

@section('header')
    <h1 class="h2">Ini halaman dashboard post</h1>
@endsection

@section('content')
    <div class="table-responsive small col-lg-9">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Tambah Post Baru</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul Postingan</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                            <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <a href="" class="btn btn-danger"><i class="bi bi-x-circle"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
