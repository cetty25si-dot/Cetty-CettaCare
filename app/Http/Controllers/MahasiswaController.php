<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->get();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:30|unique:mahasiswa,nim',
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:mahasiswa,email',
            'program_studi' => 'required|string|max:100',
        ]);

        try {
            Mahasiswa::create($validated);

            return redirect()->route('mahasiswa.index')
                ->with('success', 'Data mahasiswa berhasil ditambahkan!');
        } catch (QueryException $e) {
            return back()->withInput()
                ->with('error', 'Data mahasiswa gagal disimpan.');
        }
    }

    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nim' => [
                'required',
                'string',
                'max:30',
                Rule::unique('mahasiswa', 'nim')->ignore($mahasiswa->id),
            ],
            'nama' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('mahasiswa', 'email')->ignore($mahasiswa->id),
            ],
            'program_studi' => 'required|string|max:100',
        ]);

        try {
            $mahasiswa->update($validated);

            return redirect()->route('mahasiswa.index')
                ->with('success', 'Data mahasiswa berhasil diperbarui!');
        } catch (QueryException $e) {
            return back()->withInput()
                ->with('error', 'Data mahasiswa gagal diperbarui.');
        }
    }

    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        try {
            $mahasiswa->delete();

            return redirect()->route('mahasiswa.index')
                ->with('success', 'Data mahasiswa berhasil dihapus!');
        } catch (QueryException $e) {
            return back()->with('error', 'Data mahasiswa gagal dihapus.');
        }
    }
}
