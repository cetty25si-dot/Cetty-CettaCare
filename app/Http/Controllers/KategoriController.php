<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest()->get();

        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori',
            'deskripsi' => 'nullable|string',
        ]);

        try {
            Kategori::create($validated);

            return redirect()->route('kategori.index')
                ->with('success', 'Kategori berhasil ditambahkan!');
        } catch (QueryException $e) {
            return back()->withInput()
                ->with('error', 'Kategori gagal disimpan.');
        }
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'max:100',
                Rule::unique('kategori', 'nama_kategori')->ignore($kategori->id),
            ],
            'deskripsi' => 'nullable|string',
        ]);

        try {
            $kategori->update($validated);

            return redirect()->route('kategori.index')
                ->with('success', 'Kategori berhasil diperbarui!');
        } catch (QueryException $e) {
            return back()->withInput()
                ->with('error', 'Kategori gagal diperbarui.');
        }
    }

    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();

            return redirect()->route('kategori.index')
                ->with('success', 'Kategori berhasil dihapus!');
        } catch (QueryException $e) {
            return back()->with('error', 'Kategori gagal dihapus.');
        }
    }
}
