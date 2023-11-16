<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Sederhana</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- Bootstrap Icon --}}
</head>

<body>
    @include('components.navbar')

    <div class="container mt-3">
        <h1 class="fs-4">Selamat Datang di Blog Sederhana ini, ini adalah projek UAS Mata Kuliah Pemograman Web</h1>
    </div>

    {{-- @include('components.footer') --}}
</body>

</html>
