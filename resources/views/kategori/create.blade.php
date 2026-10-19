
@extends('admin.layout')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Tambah Kategori</h4>
                <p class="text-muted mb-0">
                    Tambahkan kategori pengaduan mahasiswa.
                </p>
            </div>

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        {{-- Pesan error --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        {{-- Pesan validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Data belum valid. Periksa kembali:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form tambah kategori --}}
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_kategori" class="form-label">
                    Nama Kategori <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    name="nama_kategori"
                    id="nama_kategori"
                    class="form-control @error('nama_kategori') is-invalid @enderror"
                    value="{{ old('nama_kategori') }}"
                    placeholder="Contoh: Akademik"
                    maxlength="100"
                    required
                >

                @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="form-label">Deskripsi</label>

                <textarea
                    name="deskripsi"
                    id="deskripsi"
                    rows="4"
                    class="form-control @error('deskripsi') is-invalid @enderror"
                    placeholder="Masukkan deskripsi kategori"
                >{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save me-2"></i>Simpan
            </button>

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                Batal
            </a>
        </form>

    </div>
</div>
@endsection
