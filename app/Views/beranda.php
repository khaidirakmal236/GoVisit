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

<!-- ── TAB KATEGORI ── -->
<section class="section-pad">
    <div class="container">
        <div class="sec-header">
            <div>
                <div class="sec-title">✨ Jelajahi Berdasarkan Kategori</div>
                <div class="sec-sub">Pilih kategori untuk melihat destinasi pilihan</div>
            </div>
            <a href="<?= base_url('eksplorasi') ?>" class="sec-link">Lihat semua →</a>
        </div>

        <!-- Tombol Tab -->
        <div class="category-pills" style="margin-bottom:1.5rem;">
            <button class="cat-pill cat-pill-all active" data-bs-toggle="tab" data-bs-target="#tab-semua" type="button">🗺️ Semua</button>
            <button class="cat-pill cat-pill-wisata" data-bs-toggle="tab" data-bs-target="#tab-wisata" type="button">🏔️ Wisata</button>
            <button class="cat-pill cat-pill-cafe" data-bs-toggle="tab" data-bs-target="#tab-cafe" type="button">☕ Cafe</button>
            <button class="cat-pill cat-pill-gem" data-bs-toggle="tab" data-bs-target="#tab-gem" type="button">💎 Hidden Gem</button>
        </div>

        <!-- Isi Tab -->
        <div class="tab-content">

            <!-- TAB: SEMUA -->
            <div class="tab-pane fade show active" id="tab-semua">
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

            <!-- TAB: WISATA -->
            <div class="tab-pane fade" id="tab-wisata">
                <div class="grid-places">
                    <?php $wisata = array_filter($tempat, fn($t) => $t['kategori'] === 'wisata'); ?>
                    <?php foreach ($wisata as $t): ?>
                    <?php $s = cek_status_buka($t['jam_buka']); $statusClass = $s['status']==='buka' ? 'status-buka' : ($s['status']==='tutup' ? 'status-tutup' : 'status-lain'); ?>
                    <a href="<?= base_url('tempat/' . $t['id']) ?>" class="place-card">
                        <div class="card-thumb thumb-wisata">
                            <?php if (!empty($t['foto_utama'])): ?>
                                <img src="<?= base_url('uploads/tempat/' . $t['foto_utama']) ?>" alt="<?= esc($t['nama_tempat']) ?>">
                            <?php else: ?> 🏔️ <?php endif; ?>
                            <div class="card-badge-pos"><span class="badge badge-wisata">Wisata</span></div>
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
                    <?php if (empty($wisata)): ?><p class="empty-msg">Belum ada destinasi wisata.</p><?php endif; ?>
                </div>
            </div>

            <!-- TAB: CAFE -->
            <div class="tab-pane fade" id="tab-cafe">
                <div class="grid-places">
                    <?php $cafe = array_filter($tempat, fn($t) => $t['kategori'] === 'cafe'); ?>
                    <?php foreach ($cafe as $t): ?>
                    <?php $s = cek_status_buka($t['jam_buka']); $statusClass = $s['status']==='buka' ? 'status-buka' : ($s['status']==='tutup' ? 'status-tutup' : 'status-lain'); ?>
                    <a href="<?= base_url('tempat/' . $t['id']) ?>" class="place-card">
                        <div class="card-thumb thumb-cafe">
                            <?php if (!empty($t['foto_utama'])): ?>
                                <img src="<?= base_url('uploads/tempat/' . $t['foto_utama']) ?>" alt="<?= esc($t['nama_tempat']) ?>">
                            <?php else: ?> ☕ <?php endif; ?>
                            <div class="card-badge-pos"><span class="badge badge-cafe">Cafe</span></div>
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
                    <?php if (empty($cafe)): ?><p class="empty-msg">Belum ada cafe.</p><?php endif; ?>
                </div>
            </div>

            <!-- TAB: HIDDEN GEM -->
            <div class="tab-pane fade" id="tab-gem">
                <div class="grid-places">
                    <?php $gems = array_filter($tempat, fn($t) => $t['kategori'] === 'hidden_gem'); ?>
                    <?php foreach ($gems as $t): ?>
                    <?php $s = cek_status_buka($t['jam_buka']); $statusClass = $s['status']==='buka' ? 'status-buka' : ($s['status']==='tutup' ? 'status-tutup' : 'status-lain'); ?>
                    <a href="<?= base_url('tempat/' . $t['id']) ?>" class="place-card">
                        <div class="card-thumb thumb-gem">
                            <?php if (!empty($t['foto_utama'])): ?>
                                <img src="<?= base_url('uploads/tempat/' . $t['foto_utama']) ?>" alt="<?= esc($t['nama_tempat']) ?>">
                            <?php else: ?> 💎 <?php endif; ?>
                            <div class="card-badge-pos"><span class="badge badge-gem">Hidden Gem</span></div>
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
                    <?php if (empty($gems)): ?><p class="empty-msg">Belum ada hidden gem.</p><?php endif; ?>
                </div>
            </div>

        </div><!-- end tab-content -->
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