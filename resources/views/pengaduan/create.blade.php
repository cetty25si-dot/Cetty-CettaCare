@extends('admin.layout')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div><h4 class="mb-1">Tambah Pengaduan</h4><p class="text-muted mb-0">Masukkan informasi pengaduan mahasiswa.</p></div>
            <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        @if (session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('pengaduan.store') }}" method="POST">
            @csrf
            <div class="mb-3"><label class="form-label" for="judul">Judul Pengaduan *</label><input class="form-control" id="judul" name="judul" value="{{ old('judul') }}" maxlength="150" required>@error('judul')<div class="text-danger small">{{ $message }}</div>@enderror</div>
            <div class="mb-3"><label class="form-label" for="mahasiswa_id">Mahasiswa *</label><select class="form-select" id="mahasiswa_id" name="mahasiswa_id" required><option value="">-- Pilih Mahasiswa --</option>@foreach ($mahasiswa as $item)<option value="{{ $item->id }}" @selected(old('mahasiswa_id') == $item->id)>{{ $item->nim }} - {{ $item->nama }}</option>@endforeach</select>@error('mahasiswa_id')<div class="text-danger small">{{ $message }}</div>@enderror</div>
            <div class="mb-3"><label class="form-label" for="kategori_id">Kategori *</label><select class="form-select" id="kategori_id" name="kategori_id" required><option value="">-- Pilih Kategori --</option>@foreach ($kategori as $item)<option value="{{ $item->id }}" @selected(old('kategori_id') == $item->id)>{{ $item->nama_kategori }}</option>@endforeach</select>@error('kategori_id')<div class="text-danger small">{{ $message }}</div>@enderror</div>
            <div class="mb-3"><label class="form-label" for="lokasi">Lokasi *</label><input class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" maxlength="150" required placeholder="Contoh: Gedung A, Lantai 2">@error('lokasi')<div class="text-danger small">{{ $message }}</div>@enderror</div>
            <div class="mb-3"><label class="form-label" for="deskripsi">Deskripsi *</label><textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>@error('deskripsi')<div class="text-danger small">{{ $message }}</div>@enderror</div>
            <div class="mb-4"><label class="form-label" for="status">Status *</label><select class="form-select" id="status" name="status" required>@foreach (['Menunggu', 'Diproses', 'Selesai', 'Ditolak'] as $status)<option value="{{ $status }}" @selected(old('status', 'Menunggu') === $status)>{{ $status }}</option>@endforeach</select>@error('status')<div class="text-danger small">{{ $message }}</div>@enderror</div>
            <button class="btn btn-primary" type="submit">Simpan Pengaduan</button>
            <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
