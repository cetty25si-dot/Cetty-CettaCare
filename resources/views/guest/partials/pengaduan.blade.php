<section class="section" id="pengaduan-terbaru">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Pengaduan Terbaru</h2>
            <p class="section-desc">Daftar pengaduan yang tercatat di CettaCare beserta status penanganannya.</p>
        </div>
        <div class="row g-4">
            @forelse ($pengaduan as $item)
                <div class="col-lg-6">
                    <div class="feature-card">
                        <div class="d-flex justify-content-between align-items-start gap-3 mb-2">
                            <h5 class="mb-0">{{ $item->judul }}</h5>
                            <span class="badge bg-info">{{ $item->status }}</span>
                        </div>
                        <p class="mb-2">{{ \Illuminate\Support\Str::limit($item->deskripsi, 130) }}</p>
                        <small class="d-block">Kategori: {{ $item->kategoriData?->nama_kategori ?? $item->kategori }}</small>
                        <small class="d-block">Lokasi: {{ $item->lokasi }}</small>
                        <small class="d-block">Dikirim oleh: {{ $item->mahasiswa?->nama ?? 'Mahasiswa' }}</small>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center"><p class="text-muted">Belum ada pengaduan yang ditampilkan.</p></div>
            @endforelse
        </div>
    </div>
</section>
