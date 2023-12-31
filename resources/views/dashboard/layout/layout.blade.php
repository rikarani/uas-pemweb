<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @isset($page)
            {{ $page }} -
        @endisset Blog Sederhana
    </title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <style>
        trix-toolbar .trix-button-row span.trix-button-group--file-tools {
            display: none
        }
    </style>
</head>

<body class="h-100 d-flex flex-column">
    @include('dashboard.partials.header')

    <div class="container-fluid h-100">
        <div class="row h-100">
            @include('dashboard.partials.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('header')

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
