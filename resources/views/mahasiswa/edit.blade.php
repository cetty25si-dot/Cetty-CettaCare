@extends('admin.layout')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Edit Mahasiswa</h4>
                <p class="text-muted mb-0">
                    Perbarui informasi data mahasiswa.
                </p>
            </div>

            <a href="{{ route('mahasiswa.index') }}"
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

        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nim" class="form-label">NIM *</label>
                <input type="text" id="nim" name="nim"
                    class="form-control @error('nim') is-invalid @enderror"
                    value="{{ old('nim', $mahasiswa->nim) }}"
                    maxlength="20" required>
                @error('nim')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa *</label>
                <input type="text" id="nama" name="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $mahasiswa->nama) }}"
                    maxlength="100" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $mahasiswa->email) }}"
                    maxlength="100" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="program_studi" class="form-label">
                    Program Studi *
                </label>
                <input type="text" id="program_studi" name="program_studi"
                    class="form-control @error('program_studi') is-invalid @enderror"
                    value="{{ old('program_studi', $mahasiswa->program_studi) }}"
                    maxlength="100" required>
                @error('program_studi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('mahasiswa.index') }}"
               class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
