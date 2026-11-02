@extends('admin.layout')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Data Tanggapan</h4>
                <p class="text-muted mb-0">Kelola tanggapan admin untuk pengaduan mahasiswa.</p>
            </div>
            <a href="{{ route('tanggapan.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Tambah Tanggapan
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle bg-white">
                <thead class="table-secondary">
                    <tr><th>No.</th><th>Pengaduan</th><th>Mahasiswa</th><th>Nama Admin</th><th>Isi Tanggapan</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse ($tanggapan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul_pengaduan }}</td>
                            <td>{{ $item->nama_mahasiswa ?? 'Belum dikaitkan' }}</td>
                            <td>{{ $item->nama_admin }}</td>
                            <td>{{ $item->isi_tanggapan }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('tanggapan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('tanggapan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus tanggapan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-4">Belum ada tanggapan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <p class="mb-0 text-muted">Total tanggapan: {{ $tanggapan->count() }}</p>
    </div>
</div>
@endsection
