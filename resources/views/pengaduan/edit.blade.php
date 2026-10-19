@extends('admin.layout')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Edit Pengaduan</h4>
                <p class="text-muted mb-0">
                    Perbarui informasi pengaduan mahasiswa.
                </p>
            </div>

            <a href="{{ route('pengaduan.index') }}"
               class="btn btn-secondary">Kembali</a>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pengaduan.update', $pengaduan->id) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul Pengaduan</label>
                <input type="text" name="judul"
                       class="form-control"
                       value="{{ old('judul', $pengaduan->judul) }}"
                       maxlength="150" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori"
                       class="form-control"
                       value="{{ old('kategori', $pengaduan->kategori) }}"
                       maxlength="100" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi"
                       class="form-control"
                       value="{{ old('lokasi', $pengaduan->lokasi) }}"
                       maxlength="150" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                          class="form-control"
                          required>{{ old('deskripsi', $pengaduan->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="Menunggu"
                        {{ old('status', $pengaduan->status) == 'Menunggu' ? 'selected' : '' }}>
                        Menunggu
                    </option>
                    <option value="Diproses"
                        {{ old('status', $pengaduan->status) == 'Diproses' ? 'selected' : '' }}>
                        Diproses
                    </option>
                    <option value="Selesai"
                        {{ old('status', $pengaduan->status) == 'Selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('pengaduan.index') }}"
               class="btn btn-secondary">Batal</a>
        </form>

    </div>
</div>
@endsection
