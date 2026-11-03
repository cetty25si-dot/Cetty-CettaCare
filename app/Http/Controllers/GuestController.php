<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class GuestController extends Controller
{
    public function index(): View
    {
        $kategori = Kategori::withCount('pengaduan')->orderBy('nama_kategori')->get();
        $pengaduan = Pengaduan::with(['kategoriData', 'mahasiswa'])
            ->latest()
            ->take(6)
            ->get();
        $tanggapan = DB::table('tanggapan')
            ->join('pengaduan', 'tanggapan.pengaduan_id', '=', 'pengaduan.id')
            ->select('tanggapan.nama_admin', 'tanggapan.isi_tanggapan', 'tanggapan.created_at', 'pengaduan.judul')
            ->orderByDesc('tanggapan.created_at')
            ->limit(4)
            ->get();

        return view('guest.index', compact('kategori', 'pengaduan', 'tanggapan'));
    }
}
