<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PengaduanController extends Controller
{
    // Menampilkan daftar pengaduan
    public function index()
    {
        $pengaduan = Pengaduan::latest()->get();

        return view('pengaduan.index', compact('pengaduan'));
    }

    // Menampilkan form tambah pengaduan
    public function create()
    {
        return view('pengaduan.create');
    }

    // Menyimpan pengaduan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'status' => 'required|in:Menunggu,Diproses,Selesai',
        ]);

        try {
            Pengaduan::create($validated);

            return redirect()->route('pengaduan.index')
                ->with('success', 'Pengaduan berhasil ditambahkan!');
        } catch (QueryException $e) {
            return back()->withInput()
                ->with('error', 'Pengaduan gagal disimpan.');
        }
    }

    // Menampilkan detail pengaduan
    public function show(string $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view('pengaduan.show', compact('pengaduan'));
    }

    // Menampilkan form edit pengaduan
    public function edit(string $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view('pengaduan.edit', compact('pengaduan'));
    }

    // Memperbarui pengaduan
    public function update(Request $request, string $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'status' => 'required|in:Menunggu,Diproses,Selesai',
        ]);

        try {
            $pengaduan->update($validated);

            return redirect()->route('pengaduan.index')
                ->with('success', 'Pengaduan berhasil diperbarui!');
        } catch (QueryException $e) {
            return back()->withInput()
                ->with('error', 'Pengaduan gagal diperbarui.');
        }
    }

    // Menghapus pengaduan
    public function destroy(string $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        try {
            $pengaduan->delete();

            return redirect()->route('pengaduan.index')
                ->with('success', 'Pengaduan berhasil dihapus!');
        } catch (QueryException $e) {
            return back()->with('error', 'Pengaduan gagal dihapus.');
        }
    }
}
