@extends('admin.layout')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">

        {{-- Header halaman --}}
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <h4 class="mb-1">Data Kategori</h4>
                <p class="text-muted mb-0">Kelola kategori pengaduan mahasiswa.</p>
            </div>

            <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Tambah Kategori
            </a>
        </div>

        {{-- Notifikasi berhasil --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Tutup"></button>
            </div>
        @endif

        {{-- Notifikasi gagal --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Tutup"></button>
            </div>
        @endif

        {{-- Notifikasi validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Periksa kembali data yang dimasukkan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Tabel kategori --}}

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle"
           style="background-color: #ffffff; color: #212529;">

        <thead>
            <tr style="background-color: #e9ecef; color: #212529;">
                <th class="text-center">No.</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($kategori as $item)
                <tr style="background-color: #ffffff; color: #212529;">
                    <td class="text-center">{{ $loop->iteration }}</td>

                    <td style="color: #212529;">
                        {{ $item->nama_kategori }}
                    </td>

                    <td style="color: #212529;">
                        {{ $item->deskripsi ?: '-' }}
                    </td>

                    <td style="color: #212529;">
                        {{ $item->created_at
                            ? $item->created_at->format('d-m-Y')
                            : '-' }}
                    </td>

                    <td class="text-center">
                        <a href="{{ route('kategori.edit', $item->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('kategori.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-3"
                        style="color: #212529;">
                        Belum ada data kategori.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


        {{-- Jumlah data --}}
        <div class="mt-3 text-muted">
            Total kategori: <strong>{{ $kategori->count() }}</strong>
        </div>

    </div>
</div>
@endsection
