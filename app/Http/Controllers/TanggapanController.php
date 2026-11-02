<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TanggapanController extends Controller
{
    public function index(): View
    {
        $tanggapan = DB::table('tanggapan')
            ->join('pengaduan', 'tanggapan.pengaduan_id', '=', 'pengaduan.id')
            ->leftJoin('mahasiswa', 'pengaduan.mahasiswa_id', '=', 'mahasiswa.id')
            ->select(
                'tanggapan.*',
                'pengaduan.judul as judul_pengaduan',
                'mahasiswa.nama as nama_mahasiswa'
            )
            ->orderByDesc('tanggapan.created_at')
            ->get();

        return view('tanggapan.index', compact('tanggapan'));
    }

    public function create(): View
    {
        $pengaduan = DB::table('pengaduan')->orderBy('judul')->get(['id', 'judul']);

        return view('tanggapan.create', compact('pengaduan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'pengaduan_id' => ['required', 'exists:pengaduan,id'],
            'nama_admin' => ['required', 'string', 'max:100'],
            'isi_tanggapan' => ['required', 'string'],
        ]);

        try {
            DB::table('tanggapan')->insert([
                ...$validated,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('tanggapan.index')
                ->with('success', 'Tanggapan berhasil ditambahkan!');
        } catch (QueryException) {
            return back()->withInput()->with('error', 'Tanggapan gagal disimpan.');
        }
    }

    public function edit(int $id): View
    {
        $tanggapan = DB::table('tanggapan')->where('id', $id)->first();
        abort_if($tanggapan === null, 404);

        $pengaduan = DB::table('pengaduan')->orderBy('judul')->get(['id', 'judul']);

        return view('tanggapan.edit', compact('tanggapan', 'pengaduan'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'pengaduan_id' => ['required', 'exists:pengaduan,id'],
            'nama_admin' => ['required', 'string', 'max:100'],
            'isi_tanggapan' => ['required', 'string'],
        ]);

        try {
            $updated = DB::table('tanggapan')->where('id', $id)->update([
                ...$validated,
                'updated_at' => now(),
            ]);

            if ($updated === 0 && ! DB::table('tanggapan')->where('id', $id)->exists()) {
                abort(404);
            }

            return redirect()->route('tanggapan.index')
                ->with('success', 'Tanggapan berhasil diperbarui!');
        } catch (QueryException) {
            return back()->withInput()->with('error', 'Tanggapan gagal diperbarui.');
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        $deleted = DB::table('tanggapan')->where('id', $id)->delete();
        abort_if($deleted === 0, 404);

        return redirect()->route('tanggapan.index')
            ->with('success', 'Tanggapan berhasil dihapus!');
    }
}
