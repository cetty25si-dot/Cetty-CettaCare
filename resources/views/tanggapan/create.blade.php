@extends('admin.layout')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div><h4 class="mb-1">Tambah Tanggapan</h4><p class="text-muted mb-0">Berikan tanggapan untuk pengaduan mahasiswa.</p></div>
            <a href="{{ route('tanggapan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        @if (session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('tanggapan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="pengaduan_id">Pengaduan *</label>
                <select class="form-select" name="pengaduan_id" id="pengaduan_id" required>
                    <option value="">-- Pilih Pengaduan --</option>
                    @foreach ($pengaduan as $item)
                        <option value="{{ $item->id }}" @selected(old('pengaduan_id') == $item->id)>{{ $item->judul }}</option>
                    @endforeach
                </select>
                @error('pengaduan_id')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3"><label class="form-label" for="nama_admin">Nama Admin *</label><input class="form-control" id="nama_admin" name="nama_admin" value="{{ old('nama_admin', 'Admin CettaCare') }}" maxlength="100" required>@error('nama_admin')<div class="text-danger small">{{ $message }}</div>@enderror</div>
            <div class="mb-4"><label class="form-label" for="isi_tanggapan">Isi Tanggapan *</label><textarea class="form-control" id="isi_tanggapan" name="isi_tanggapan" rows="5" required>{{ old('isi_tanggapan') }}</textarea>@error('isi_tanggapan')<div class="text-danger small">{{ $message }}</div>@enderror</div>
            <button class="btn btn-primary" type="submit">Simpan Tanggapan</button>
            <a href="{{ route('tanggapan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
