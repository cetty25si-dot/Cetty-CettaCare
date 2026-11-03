<section class="section steps-section" id="tanggapan-terbaru">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Tanggapan Terbaru</h2>
            <p class="section-desc">Informasi tindak lanjut dari admin terhadap pengaduan mahasiswa.</p>
        </div>
        <div class="row g-4">
            @forelse ($tanggapan as $item)
                <div class="col-md-6">
                    <div class="feature-card">
                        <h5>{{ $item->judul }}</h5>
                        <p>{{ $item->isi_tanggapan }}</p>
                        <small>Ditanggapi oleh {{ $item->nama_admin }} · {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d-m-Y') }}</small>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center"><p class="text-muted">Belum ada tanggapan dari admin.</p></div>
            @endforelse
        </div>
    </div>
</section>
