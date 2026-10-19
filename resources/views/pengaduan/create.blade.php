@extends('admin.layout')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Tambah Pengaduan</h4>
                <p class="text-muted mb-0">
                    Masukkan informasi pengaduan mahasiswa.
                </p>
            </div>

            <a href="{{ route('pengaduan.index') }}"
               class="btn btn-secondary">Kembali</a>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data berikut:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pengaduan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Pengaduan *</label>
                <input type="text" id="judul" name="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul') }}" maxlength="150" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori *</label>
                <input type="text" id="kategori" name="kategori"
                    class="form-control @error('kategori') is-invalid @enderror"
                    value="{{ old('kategori') }}" maxlength="100" required
                    placeholder="Contoh: Akademik">
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi *</label>
                <input type="text" id="lokasi" name="lokasi"
                    class="form-control @error('lokasi') is-invalid @enderror"
                    value="{{ old('lokasi') }}" maxlength="150" required
                    placeholder="Contoh: Gedung A, Lantai 2">
                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi *</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"
                    class="form-control @error('deskripsi') is-invalid @enderror"
                    required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status *</label>
                <select id="status" name="status"
                    class="form-select @error('status') is-invalid @enderror"
                    required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Menunggu"
                        {{ old('status', 'Menunggu') == 'Menunggu' ? 'selected' : '' }}>
                        Menunggu
                    </option>
                    <option value="Diproses"
                        {{ old('status') == 'Diproses' ? 'selected' : '' }}>
                        Diproses
                    </option>
                    <option value="Selesai"
                        {{ old('status') == 'Selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Pengaduan
            </button>

            <a href="{{ route('pengaduan.index') }}"
               class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
