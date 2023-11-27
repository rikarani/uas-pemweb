@extends('layout.layout')

@section('title')
    <h1>Tentang Kami</h1>
@endsection

@section('content')
    <div class="row justify-content-between">
        <div class="col-sm-6" style="text-align: justify">
            <p class="mt-5">Salam bahagia semuanya!
                Web ini kami buat dalam rangka memenuhi Ujian Akhir Semester
                pada Mata Kuliah Pemrograman Web. Adanya web ini bertujuan
                untuk memudahkan seluruh mahasiswa Informatika dalam mencari
                dan mengakses materi-materi kuliah, baik dalam bentuk PPT, PDF, atau DOCX,
                yang telah dibagikan di kelas tanpa harus mencarinya
                lagi di internet. Materi-materi kuliah diorganisir berdasarkan
                Mata Kuliah, sehingga memudahkan mahasiswa untuk menelusuri konten
                sesuai dengan kebutuhan mereka. Web ini kami dedikasikan kepada
                mahasiswa Informatika, khususnya angakatan 2021.<br><br><br>
                Tertanda,<br>
                Kelompok 5.</p>
        </div>
        <div class="col-md-auto">
            <img src="{{ asset('img/img.png') }}" class="d-block w-100" alt="Image">
        </div>
    </div>
@endsection
