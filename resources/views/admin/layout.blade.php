<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>CettaCare - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
          rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-fluid position-relative d-flex p-0">

    @include('admin.partials.sidebar')

    <!-- Content -->
    <div class="content">

        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-3">
            <span class="navbar-brand mb-0">
                Sistem Informasi Pengaduan Mahasiswa
            </span>
        </nav>

        @yield('content')

        <!-- Footer -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded p-3 text-center">
                <span>
                    &copy; CettaCare - Sistem Informasi Pengaduan Mahasiswa
                </span>
            </div>
        </div>

    </div>
</div>

<script src="{{ asset('guest/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>
</body>
</html>
