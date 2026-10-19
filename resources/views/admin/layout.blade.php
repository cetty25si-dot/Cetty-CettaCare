<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>CettaCare - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-fluid position-relative d-flex p-0">

    <!-- Sidebar -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="{{ url('/admin/dashboard') }}" class="navbar-brand mx-4 mb-3">
                <img src="{{ asset('admin/img/logoCettaCare.png') }}"
                     alt="CettaCare" style="max-width:170px;height:auto;">
            </a>

            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="ms-2">
                    <h6 class="mb-0">Cetty Dwi</h6>
                    <span>Admin</span>
                </div>
            </div>

            <div class="navbar-nav w-100">
                <a href="{{ url('/admin/dashboard') }}" class="nav-item nav-link">
                    <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <a href="{{ route('kategori.index') }}" class="nav-item nav-link">
                    <i class="fa fa-list me-2"></i>Kategori
                </a>
                <a href="{{ route('mahasiswa.index') }}" class="nav-item nav-link">
                    <i class="fa fa-users me-2"></i>Mahasiswa
                </a>
                <a href="{{ route('pengaduan.index') }}" class="nav-item nav-link">
                    <i class="fa fa-comment-alt me-2"></i>Pengaduan
                </a>
            </div>
        </nav>
    </div>

    <!-- Content -->
    <div class="content">
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-3">
            <span class="navbar-brand mb-0">Sistem Informasi Pengaduan Mahasiswa</span>
        </nav>

        @yield('content')

        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded p-3 text-center">
                <span>&copy; CettaCare - Sistem Informasi Pengaduan Mahasiswa</span>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>
</body>
</html>
