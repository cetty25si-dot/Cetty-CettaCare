@extends('guest.layout')

@section('title', 'Home - CettaCare')

@section('content')
<div class="text-center py-5">
    <h1 class="fw-bold text-primary">Selamat Datang di CettaCare</h1>
    <p class="lead mt-3">
        Sistem Informasi Pengaduan Mahasiswa untuk membantu
        penyampaian dan pengelolaan pengaduan di lingkungan kampus.
    </p>
    <a href="{{ route('login') }}" class="btn btn-primary mt-3">
        Login Sekarang
    </a>
</div>
@endsection
