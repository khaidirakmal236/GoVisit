<?= view('layout/header', ['title' => $title]) ?>

<div class="container py-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb small">
            <li class="breadcrumb-item"><a href="/govisit/beranda">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/govisit/eksplorasi">Eksplorasi</a></li>
            <li class="breadcrumb-item">
                <a href="/govisit/eksplorasi"><?= esc($kategori) ?></a>
            </li>
            <li class="breadcrumb-item active"><?= esc($heading) ?></li>
        </ol>
    </nav>

    <div class="row g-4">

        <!-- KONTEN UTAMA -->
        <div class="col-lg-8">

            <!-- Judul & Badge -->
            <div class="mb-3">
                <div class="d-flex flex-wrap gap-2 mb-2">
                    <span class="badge rounded-pill px-3 py-1"
                          style="background:#FFCC3E; color:#1A1A2E; font-weight:700;">
                        <?= esc($kategori) ?>
                    </span>
                    <span class="badge rounded-pill px-3 py-1"
                          style="background:#FF4D2E; color:#fff; font-weight:700;">
                        Popular
                    </span>
                </div>
                <h1 class="fw-bold" style="color:#0A4D8C;"><?= esc($heading) ?></h1>
                <p class="text-muted">
                    <i class="bi bi-geo-alt-fill" style="color:#FF4D2E;"></i>
                    <?= esc($alamat) ?>
                </p>
            </div>

            <!-- Skor Rekomendasi Tim -->
            <div class="rounded-4 p-4 mb-4 d-flex align-items-center gap-3"
                 style="background: linear-gradient(135deg, #FFCC3E, #FFA52E);">
                <div style="font-size:3rem; font-weight:800; line-height:1; color:#1A1A2E;">
                    <?= esc($skor) ?>
                </div>
                <div>
                    <div style="font-size:1.3rem;">
                        <?php
                        $r = (float) $skor;
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $r) echo '<i class="bi bi-star-fill" style="color:#0A4D8C;"></i>';
                            elseif ($i - 0.5 <= $r) echo '<i class="bi bi-star-half" style="color:#0A4D8C;"></i>';
                            else echo '<i class="bi bi-star" style="color:#0A4D8C;"></i>';
                        }
                        ?>
                    </div>
                    <small style="color:rgba(0,0,0,.65);">
                        <i class="bi bi-patch-check-fill me-1" style="color:#0A4D8C;"></i>
                        Skor rekomendasi dari Tim GoVisit
                    </small>
                </div>
            </div>

            <!-- Deskripsi -->
            <h4 class="fw-bold" style="color:#0A4D8C;">Tentang Tempat Ini</h4>
            <p style="line-height:1.9; color:#374151;"><?= esc($deskripsi) ?></p>

            <!-- Tips -->
            <div class="rounded-4 p-4 my-4"
                 style="background:#fff; border-left:4px solid #FFA52E; box-shadow:0 4px 14px rgba(10,77,140,.07);">
                <h5 class="fw-bold mb-3" style="color:#0A4D8C;">
                    <i class="bi bi-lightbulb-fill" style="color:#FFCC3E;"></i> Tips Berkunjung
                </h5>
                <ul class="mb-0" style="color:#374151; line-height:2;">
                    <?php foreach ($tips as $tip): ?>
                        <li><?= esc($tip) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Catatan Tim GoVisit -->
            <h4 class="fw-bold mt-5 mb-3" style="color:#0A4D8C;">
                <i class="bi bi-patch-check-fill" style="color:#FFA52E;"></i>
                Catatan Tim GoVisit
            </h4>

            <?php foreach ($catatan_tim as $c): ?>
                <div class="bg-white rounded-4 p-4 mb-3 shadow-sm"
                     style="border-left:4px solid #0A4D8C;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white flex-shrink-0"
                             style="width:44px; height:44px; background:#0A4D8C;">
                            <?= strtoupper(substr($c['penulis'], 0, 1)) ?>
                        </div>
                        <div>
                            <strong class="d-block"><?= esc($c['penulis']) ?></strong>
                            <small style="color:#FFA52E; font-weight:600;">
                                <i class="bi bi-patch-check-fill me-1"></i>Tim GoVisit
                            </small>
                        </div>
                        <div class="ms-auto" style="color:#FFA52E; font-size:.95rem;">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i class="bi bi-star<?= $i <= (int)$c['skor'] ? '-fill' : '' ?>"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <p class="mb-0" style="color:#374151; line-height:1.8;"><?= esc($c['catatan']) ?></p>
                </div>
            <?php endforeach; ?>

        </div>

        <!-- SIDEBAR KANAN -->
        <aside class="col-lg-4">
            <div class="bg-white rounded-4 shadow-sm p-4 mb-4">

                <!-- Rekomendasi Tim Badge -->
                <div class="text-center rounded-3 p-3 mb-3"
                     style="background:#FFF3C4; border:1px dashed rgba(10,77,140,.2);">
                    <i class="bi bi-patch-check-fill" style="font-size:1.8rem; color:#0A4D8C;"></i>
                    <p class="fw-bold mb-0 mt-1 small" style="color:#0A4D8C;">
                        Direkomendasikan oleh Tim GoVisit
                    </p>
                </div>

                <!-- Info Lokasi -->
                <div class="d-flex align-items-start gap-3 py-3"
                     style="border-bottom:1px dashed rgba(10,77,140,.1);">
                    <div class="rounded-2 d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:38px; height:38px; background:#FFF3C4; color:#0A4D8C; font-size:1rem;">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div>
                        <strong class="d-block small">Alamat</strong>
                        <span class="text-muted small"><?= esc($alamat) ?></span>
                    </div>
                </div>

                <!-- Jam Buka -->
                <div class="d-flex align-items-start gap-3 py-3"
                     style="border-bottom:1px dashed rgba(10,77,140,.1);">
                    <div class="rounded-2 d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:38px; height:38px; background:#FFF3C4; color:#0A4D8C; font-size:1rem;">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <div>
                        <strong class="d-block small">Jam Buka</strong>
                        <span class="text-muted small"><?= esc($jam_buka) ?></span>
                    </div>
                </div>

                <!-- Kategori -->
                <div class="d-flex align-items-start gap-3 py-3">
                    <div class="rounded-2 d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:38px; height:38px; background:#FFF3C4; color:#0A4D8C; font-size:1rem;">
                        <i class="bi bi-tag-fill"></i>
                    </div>
                    <div>
                        <strong class="d-block small">Kategori</strong>
                        <span class="text-muted small"><?= esc($kategori) ?></span>
                    </div>
                </div>

            </div>

            <!-- Placeholder Peta -->
            <div class="bg-white rounded-4 shadow-sm p-4">
                <h6 class="fw-bold mb-3" style="color:#0A4D8C;">Lokasi di Peta</h6>
                <div class="rounded-3 d-flex align-items-center justify-content-center text-muted"
                     style="height:180px; background:#FFF3C4; border:2px dashed rgba(10,77,140,.15);">
                    <div class="text-center">
                        <i class="bi bi-map" style="font-size:2rem; color:#0A4D8C; display:block; margin-bottom:.5rem;"></i>
                        <span class="small">Peta akan ditampilkan<br>setelah konfigurasi Maps</span>
                    </div>
                </div>
                <p class="small text-muted mt-2 mb-0">
                    <i class="bi bi-geo-alt-fill me-1" style="color:#FF4D2E;"></i>
                    <?= esc($kota) ?>, Indonesia
                </p>
            </div>

        </aside>

    </div>
</div>

<?= view('layout/footer') ?>