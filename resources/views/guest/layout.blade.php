<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'CettaCare')</title>
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="min-vh-100 d-flex flex-column">

    @include('guest.partials.navbar')

    <main class="container py-5 flex-grow-1">
        @yield('content')
    </main>

    @include('guest.partials.footer')

    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
