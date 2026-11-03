<!-- Sidebar Partial View -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">

        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}"
           class="navbar-brand mx-4 mb-3">
            <img src="{{ asset('admin/img/logoCettaCare.png') }}"
                 alt="Logo CettaCare"
                 style="max-width:170px;height:auto;">
        </a>

        <!-- Informasi Admin -->
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="ms-2">
                <h6 class="mb-0">Cetty Dwi</h6>
                <span>Admin</span>
            </div>
        </div>

        <!-- Menu Navigasi -->
        <div class="navbar-nav w-100">

            <a href="{{ route('admin.dashboard') }}"
               class="nav-item nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <a href="{{ route('pengaduan.index') }}"
               class="nav-item nav-link {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">
                <i class="fa fa-comment-alt me-2"></i>Pengaduan
            </a>

            <a href="{{ route('tanggapan.index') }}"
               class="nav-item nav-link {{ request()->routeIs('tanggapan.*') ? 'active' : '' }}">
                <i class="fa fa-reply me-2"></i>Tanggapan
            </a>

            <a href="{{ route('kategori.index') }}"
               class="nav-item nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                <i class="fa fa-list me-2"></i>Kategori
            </a>

            <a href="{{ route('mahasiswa.index') }}"
               class="nav-item nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                <i class="fa fa-users me-2"></i>Mahasiswa
            </a>

            <a href="{{ route('user.index') }}"
               class="nav-item nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                <i class="fa fa-user-cog me-2"></i>User
            </a>

        </div>
    </nav>
</div>
