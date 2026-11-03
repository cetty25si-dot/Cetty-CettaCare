<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Mahasiswa;
use App\Models\Pengaduan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengaduanController extends Controller
{
    public function index(): View
    {
        $pengaduan = Pengaduan::with(['mahasiswa', 'kategoriData', 'tanggapan'])
            ->latest()
            ->get();

        return view('pengaduan.index', compact('pengaduan'));
    }

    public function create(): View
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();
        $mahasiswa = Mahasiswa::orderBy('nama')->get();

        return view('pengaduan.create', compact('kategori', 'mahasiswa'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'kategori_id' => ['required', 'exists:kategori,id'],
            'mahasiswa_id' => ['required', 'exists:mahasiswa,id'],
            'lokasi' => ['required', 'string', 'max:150'],
            'deskripsi' => ['required', 'string'],
            'status' => ['required', 'in:Menunggu,Diproses,Selesai,Ditolak'],
        ]);

        $kategori = Kategori::findOrFail($validated['kategori_id']);
        $validated['kategori'] = $kategori->nama_kategori;

        Pengaduan::create($validated);

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil ditambahkan!');
    }

    public function edit(Pengaduan $pengaduan): View
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();
        $mahasiswa = Mahasiswa::orderBy('nama')->get();

        return view('pengaduan.edit', compact('pengaduan', 'kategori', 'mahasiswa'));
    }

    public function update(Request $request, Pengaduan $pengaduan): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'kategori_id' => ['required', 'exists:kategori,id'],
            'mahasiswa_id' => ['required', 'exists:mahasiswa,id'],
            'lokasi' => ['required', 'string', 'max:150'],
            'deskripsi' => ['required', 'string'],
            'status' => ['required', 'in:Menunggu,Diproses,Selesai,Ditolak'],
        ]);

        $kategori = Kategori::findOrFail($validated['kategori_id']);
        $validated['kategori'] = $kategori->nama_kategori;
        $pengaduan->update($validated);

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil diperbarui!');
    }

    public function destroy(Pengaduan $pengaduan): RedirectResponse
    {
        $pengaduan->delete();

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus!');
    }
}
