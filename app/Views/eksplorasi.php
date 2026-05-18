<?= view('layout/header', ['title' => $title]) ?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <h1><?= esc($heading) ?></h1>
        <p class="mb-0">Temukan tempat wisata, cafe hits, dan hidden gems terbaik dari seluruh Indonesia.</p>
    </div>
</section>

<div class="container py-5">
    <div class="row g-4">

        <!-- FILTER SIDEBAR -->
        <aside class="col-lg-3">
            <div class="bg-white rounded-4 p-4 shadow-sm" style="position:sticky; top:80px;">
                <h6 class="fw-bold mb-3" style="color:#0A4D8C; text-transform:uppercase; font-size:.78rem; letter-spacing:.08em;">
                    Filter
                </h6>

                <p class="fw-semibold small mb-2">Kategori</p>
                <?php foreach (['Semua', 'Wisata Alam', 'Cafe Hits', 'Hidden Gems'] as $kat): ?>
                    <div class="form-check mb-1">
                        <input class="form-check-input" type="radio" name="kategori"
                               id="kat-<?= esc(strtolower(str_replace(' ', '-', $kat))) ?>"
                               <?= $kat === 'Semua' ? 'checked' : '' ?>>
                        <label class="form-check-label small"
                               for="kat-<?= esc(strtolower(str_replace(' ', '-', $kat))) ?>">
                            <?= esc($kat) ?>
                        </label>
                    </div>
                <?php endforeach; ?>

                <hr>
                <p class="fw-semibold small mb-2">Rating Minimum</p>
                <?php foreach (['Semua Rating', '3 Bintang ke Atas', '4 Bintang ke Atas', '4.5 Bintang ke Atas'] as $r): ?>
                    <div class="form-check mb-1">
                        <input class="form-check-input" type="radio" name="rating"
                               id="rat-<?= esc($loop ?? 0) ?>"
                               <?= $r === 'Semua Rating' ? 'checked' : '' ?>>
                        <label class="form-check-label small"><?= esc($r) ?></label>
                    </div>
                <?php endforeach; ?>

                <hr>
                <p class="fw-semibold small mb-2">Kota</p>
                <select class="form-select form-select-sm">
                    <option>Semua Kota</option>
                    <?php foreach (['Bandung', 'Yogyakarta', 'Bogor', 'Gunungkidul', 'Lumajang', 'Labuan Bajo'] as $kota): ?>
                        <option><?= esc($kota) ?></option>
                    <?php endforeach; ?>
                </select>

                <button class="btn w-100 mt-3 fw-bold"
                        style="background:#0A4D8C; color:#fff; border-radius:10px;">
                    <i class="bi bi-funnel-fill me-1"></i> Terapkan Filter
                </button>
            </div>
        </aside>

        <!-- DAFTAR TEMPAT -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <p class="mb-0 text-muted">
                    Menampilkan <strong><?= count($tempat) ?></strong> tempat
                </p>
                <select class="form-select form-select-sm w-auto">
                    <option>Terbaru</option>
                    <option>Rating Tertinggi</option>
                    <option>Nama (A-Z)</option>
                </select>
            </div>

            <div class="row g-4">
                <?php foreach ($tempat as $t): ?>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-white rounded-4 shadow-sm h-100 d-flex flex-column"
                             style="border:1px solid rgba(10,77,140,.06); overflow:hidden;">
                            <!-- Badge kategori -->
                            <div class="px-3 pt-3">
                                <span class="badge rounded-pill px-2 py-1"
                                      style="background:#FFCC3E; color:#1A1A2E; font-size:.7rem; font-weight:700;">
                                    <?= esc($t['kategori']) ?>
                                </span>
                            </div>
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                <h5 class="fw-bold mb-1" style="font-size:1rem; color:#1A1A2E;">
                                    <?= esc($t['nama']) ?>
                                </h5>
                                <p class="small text-muted mb-2">
                                    <i class="bi bi-geo-alt"></i> <?= esc($t['kota']) ?>
                                </p>
                                <p class="small mb-3" style="color:#6B7280; flex-grow:1;">
                                    <?= esc($t['deskripsi']) ?>
                                </p>
                                <div class="d-flex align-items-center justify-content-between mt-auto pt-2"
                                     style="border-top:1px dashed rgba(10,77,140,.12);">
                                    <div style="color:#FFA52E; font-size:.9rem;">
                                        <?php
                                        $r = (float) $t['rating'];
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo $i <= $r ? '<i class="bi bi-star-fill"></i>' : '<i class="bi bi-star"></i>';
                                        }
                                        ?>
                                        <strong class="ms-1 text-dark"><?= esc($t['rating']) ?></strong>
                                    </div>
                                    <a href="/govisit/detail/<?= $t['id'] ?>"
                                       class="btn btn-sm fw-bold"
                                       style="background:#FF4D2E; color:#fff; border-radius:8px; font-size:.78rem;">
                                        Detail <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination text -->
            <div class="text-center mt-5">
                <p class="text-muted small">Menampilkan 8 dari 12 tempat</p>
                <button class="btn px-4 fw-semibold"
                        style="border:2px solid #0A4D8C; color:#0A4D8C; border-radius:10px;">
                    Muat Lebih Banyak
                </button>
            </div>
        </div>

    </div>
</div>

<?= view('layout/footer') ?>