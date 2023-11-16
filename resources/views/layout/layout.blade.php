<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Sederhana</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- Bootstrap Icon --}}

    {{-- Style --}}
    <link rel="stylesheet" href="/css/style.css">
    {{-- Style --}}
</head>

<body class="d-flex flex-column h-100">
    @include('components.navbar')

    <main class="flex-shrink-0">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('components.footer')

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
