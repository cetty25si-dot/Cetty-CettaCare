<section class="section steps-section" id="kategori">
    <div class="container text-center">
        <h2 class="section-title">Kategori Pengaduan</h2>
        <p class="section-desc">Kategori yang tersedia untuk membantu mengelompokkan pengaduan mahasiswa.</p>
        <div class="row g-4 text-start">
            @forelse ($kategori as $item)
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">&#128203;</div>
                        <h5>{{ $item->nama_kategori }}</h5>
                        <p>{{ $item->deskripsi ?: 'Kategori pengaduan CettaCare.' }}</p>
                        <small>{{ $item->pengaduan_count }} pengaduan</small>
                    </div>
                </div>
            @empty
                <div class="col-12"><p class="text-muted">Belum ada kategori yang tersedia.</p></div>
            @endforelse
        </div>
    </div>
</section>
