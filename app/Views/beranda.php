<?= $this->include('layout/header') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/beranda.css') ?>">

<main>

<!-- ── HERO ── -->
<section class="hero">
    <div class="container hero-inner">
        <div class="hero-badge">🌴 Wisata Kota Palu & Sekitarnya</div>
        <h1>Jelajahi Keindahan<br><span>Kota Palu</span></h1>
        <p>Temukan destinasi wisata, cafe hits, dan hidden gem terbaik di Palu</p>
        <form action="<?= base_url('eksplorasi') ?>" method="GET" class="hero-search" id="heroSearchForm">
            <div class="ac-wrap">
                <input type="text" name="q" id="heroSearchInput" placeholder="Cari tempat di Palu..." autocomplete="off">
            </div>
            <button type="submit">🔍 Cari</button>
        </form>
    </div>

    <!-- Wave bottom -->
    <div class="hero-wave">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0,30 C360,60 1080,0 1440,30 L1440,60 L0,60 Z" fill="#F8FAF9"/>
        </svg>
    </div>
</section>

<!-- ── STATS ── -->
<section class="stats-bar">
    <div class="container">
        <div class="stat-item">
            <div class="stat-num"><?= count($tempat) ?>+</div>
            <div class="stat-lbl">Destinasi</div>
        </div>
        <div class="stat-item">
            <div class="stat-num"><?= count(array_filter($tempat, fn($t) => $t['kategori']==='wisata')) ?>+</div>
            <div class="stat-lbl">Wisata Alam</div>
        </div>
        <div class="stat-item">
            <div class="stat-num"><?= count(array_filter($tempat, fn($t) => $t['kategori']==='cafe')) ?>+</div>
            <div class="stat-lbl">Cafe & Kuliner</div>
        </div>
        <div class="stat-item">
            <div class="stat-num"><?= count($hidden_gem) ?>+</div>
            <div class="stat-lbl">Hidden Gem</div>
        </div>
    </div>
</section>

<!-- ── KATEGORI PILLS ── -->
<section class="category-pills">
    <div class="container">
        <a href="<?= base_url('eksplorasi') ?>" class="cat-pill cat-pill-all">🗺️ Semua</a>
        <a href="<?= base_url('eksplorasi?kategori=wisata') ?>" class="cat-pill cat-pill-wisata">🏔️ Wisata</a>
        <a href="<?= base_url('eksplorasi?kategori=cafe') ?>" class="cat-pill cat-pill-cafe">☕ Cafe</a>
        <a href="<?= base_url('hidden-gem') ?>" class="cat-pill cat-pill-gem">💎 Hidden Gem</a>
    </div>
</section>

<!-- ── REKOMENDASI ── -->
<section class="section-pad">
    <div class="container">
        <div class="sec-header">
            <div>
                <div class="sec-title">✨ Rekomendasi Untukmu</div>
                <div class="sec-sub">Destinasi terpopuler di Kota Palu</div>
            </div>
            <a href="<?= base_url('eksplorasi') ?>" class="sec-link">Lihat semua →</a>
        </div>

        <div class="grid-places">
            <?php if (!empty($tempat)): ?>
                <?php foreach ($tempat as $t): ?>
                <?php
                    $thumbClass = $t['kategori']==='wisata' ? 'thumb-wisata' : ($t['kategori']==='cafe' ? 'thumb-cafe' : 'thumb-gem');
                    $s = cek_status_buka($t['jam_buka']);
                    $statusClass = $s['status']==='buka' ? 'status-buka' : ($s['status']==='tutup' ? 'status-tutup' : 'status-lain');
                ?>
                <a href="<?= base_url('tempat/' . $t['id']) ?>" class="place-card">
                    <div class="card-thumb <?= $thumbClass ?>">
                        <?php if (!empty($t['foto_utama'])): ?>
                            <img src="<?= base_url('uploads/tempat/' . $t['foto_utama']) ?>" alt="<?= esc($t['nama_tempat']) ?>">
                        <?php else: ?>
                            <?= $t['kategori']==='wisata' ? '🏔️' : ($t['kategori']==='cafe' ? '☕' : '💎') ?>
                        <?php endif; ?>
                        <div class="card-badge-pos">
                            <span class="badge badge-<?= $t['kategori']==='hidden_gem' ? 'gem' : $t['kategori'] ?>">
                                <?= $t['kategori']==='hidden_gem' ? 'Hidden Gem' : ucfirst($t['kategori']) ?>
                            </span>
                        </div>
                        <div class="card-rating-pos">⭐ <?= number_format($t['rating_avg'],1) ?></div>
                    </div>
                    <div class="card-body">
                        <div class="card-name"><?= esc($t['nama_tempat']) ?></div>
                        <div class="card-loc">📍 <?= esc($t['alamat']) ?></div>
                        <div class="status-pill <?= $statusClass ?>">
                            <span class="status-dot" style="background:<?= $s['warna'] ?>;"></span>
                            <span class="status-label" style="color:<?= $s['warna'] ?>;"><?= $s['label'] ?></span>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="empty-msg">Belum ada data tempat.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ── HIDDEN GEM ── -->
<section class="gem-section">
    <div class="container">
        <div class="sec-header">
            <div>
                <div class="sec-title sec-title-gem">💎 Hidden Gem Pilihan</div>
                <div class="sec-sub sec-sub-gem">Spot tersembunyi yang wajib kamu kunjungi</div>
            </div>
            <a href="<?= base_url('hidden-gem') ?>" class="sec-link sec-link-gem">Lihat semua →</a>
        </div>

        <div class="grid-gems">
            <?php if (!empty($hidden_gem)): ?>
                <?php foreach ($hidden_gem as $gem): ?>
                <a href="<?= base_url('tempat/' . $gem['id']) ?>" class="gem-card">
                    <div class="gem-icon">💎</div>
                    <div class="gem-info">
                        <div class="gem-name"><?= esc($gem['nama_tempat']) ?></div>
                        <div class="gem-loc">📍 <?= esc($gem['alamat']) ?></div>
                    </div>
                    <div class="gem-rating">⭐ <?= number_format($gem['rating_avg'],1) ?></div>
                </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="empty-msg-gem">Belum ada hidden gem.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

</main>

<?= $this->include('layout/footer') ?>