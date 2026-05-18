<?= view('layout/header', ['title' => $title]) ?>

<!-- HERO -->
<section class="page-hero">
    <div class="container">
        <h1><?= esc($heading) ?></h1>
        <p class="mb-0">Mengenal lebih jauh platform rekomendasi wisata terpercaya dari komunitas Indonesia.</p>
    </div>
</section>

<div class="container py-5">

    <!-- TENTANG -->
    <div class="row align-items-center g-5 mb-5">
        <div class="col-lg-6">
            <span class="badge px-3 py-2 mb-3 fw-semibold"
                  style="background:#FFCC3E; color:#1A1A2E;">Cerita Kami</span>
            <h2 class="fw-bold" style="color:#0A4D8C;">Dari Traveler, Untuk Traveler</h2>
            <p style="color:#374151; line-height:1.85;">
                GoVisit lahir pada 2023 dari keresahan sederhana — susahnya menemukan rekomendasi
                tempat wisata yang <em>jujur</em> dan <em>relevan</em> di internet. Banyak blog
                berbayar, sedikit yang autentik.
            </p>
            <p style="color:#374151; line-height:1.85;">
                Kami membangun GoVisit sebagai ruang bagi para traveler sejati untuk berbagi
                cerita dan pengalaman nyata — bukan iklan, bukan endorse. Setiap review yang
                kamu baca berasal dari orang yang benar-benar sudah ke sana.
            </p>
            <p style="color:#374151; line-height:1.85;">
                Hari ini, GoVisit telah mengkurasi lebih dari 12 destinasi pilihan dari berbagai
                penjuru Indonesia, dengan komunitas yang terus bertumbuh setiap harinya.
            </p>
        </div>
        <div class="col-lg-6">
            <div class="rounded-4 p-4 text-center"
                 style="background: linear-gradient(135deg, #0A4D8C 0%, #1a6cb6 100%); color:#fff; min-height:280px; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                <i class="bi bi-geo-alt-fill mb-3" style="font-size:4rem; color:#FFCC3E;"></i>
                <h3 class="fw-bold text-white">Go<span style="color:#FFCC3E;">Visit</span></h3>
                <p style="opacity:.85; max-width:280px;">
                    "Setiap perjalanan adalah cerita yang layak untuk dibagikan."
                </p>
                <p style="color:#FFCC3E; font-style:italic; margin:0;">— Tim GoVisit</p>
            </div>
        </div>
    </div>

    <!-- VISI MISI -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="bg-white rounded-4 p-4 shadow-sm h-100">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center"
                         style="width:50px; height:50px; background:#FFCC3E; font-size:1.5rem;">
                        🎯
                    </div>
                    <h4 class="fw-bold mb-0" style="color:#0A4D8C;">Visi</h4>
                </div>
                <p style="color:#374151; line-height:1.85; margin:0;"><?= esc($visi) ?></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-white rounded-4 p-4 shadow-sm h-100">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center"
                         style="width:50px; height:50px; background:#FF4D2E; font-size:1.5rem; color:#fff;">
                        🚀
                    </div>
                    <h4 class="fw-bold mb-0" style="color:#0A4D8C;">Misi</h4>
                </div>
                <ul style="color:#374151; line-height:2; margin:0; padding-left:1.2rem;">
                    <?php foreach ($misi as $m): ?>
                        <li><?= esc($m) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- NILAI -->
    <h2 class="fw-bold text-center mb-2" style="color:#0A4D8C;">Nilai-Nilai Kami</h2>
    <p class="text-center text-muted mb-4">Prinsip yang menjadi pondasi GoVisit</p>
    <div class="row g-4 mb-5">
        <?php
        $icons   = ['✅', '🔍', '🤝', '🌏'];
        $borders = ['#0A4D8C', '#FF4D2E', '#FFA52E', '#FFCC3E'];
        foreach ($nilai as $n => $val):
            $b = $borders[$n % 4];
        ?>
            <div class="col-md-6 col-lg-3">
                <div class="bg-white rounded-4 p-4 shadow-sm h-100 text-center"
                     style="border-top:4px solid <?= $b ?>;">
                    <div style="font-size:2rem; margin-bottom:.75rem;"><?= $icons[$n % 4] ?></div>
                    <h5 class="fw-bold" style="color:#0A4D8C;"><?= esc($val['judul']) ?></h5>
                    <p class="text-muted small mb-0" style="line-height:1.7;">
                        <?= esc($val['isi']) ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- TIM -->
    <h2 class="fw-bold text-center mb-2" style="color:#0A4D8C;">Tim Kami</h2>
    <p class="text-center text-muted mb-4">Orang-orang di balik GoVisit</p>
    <div class="row g-4 mb-5 justify-content-center">
        <?php
        $avatarColors = ['#0A4D8C','#FF4D2E','#FFA52E','#FFCC3E'];
        foreach ($tim as $i => $t):
            $c = $avatarColors[$i % 4];
        ?>
            <div class="col-6 col-md-3">
                <div class="bg-white rounded-4 p-4 shadow-sm text-center h-100">
                    <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center fw-bold text-white"
                         style="width:64px; height:64px; background:<?= $c ?>; font-size:1.5rem;">
                        <?= strtoupper(substr($t['nama'], 0, 1)) ?>
                    </div>
                    <h6 class="fw-bold mb-1 small" style="color:#1A1A2E;"><?= esc($t['nama']) ?></h6>
                    <p class="text-muted" style="font-size:.8rem; margin:0;"><?= esc($t['peran']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- KONTAK -->
    <div class="rounded-4 p-5 text-center"
         style="background:#0A4D8C; color:#fff;">
        <h3 class="fw-bold text-white">Hubungi Kami</h3>
        <p style="opacity:.85; max-width:500px; margin:0 auto 1.5rem;">
            Ada pertanyaan, masukan, atau ingin berkolaborasi? Kami selalu senang mendengar dari komunitas.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-4">
            <div>
                <i class="bi bi-envelope-fill me-1" style="color:#FFCC3E;"></i>
                <strong><?= esc($kontak['email']) ?></strong>
            </div>
            <div>
                <i class="bi bi-telephone-fill me-1" style="color:#FFCC3E;"></i>
                <strong><?= esc($kontak['telepon']) ?></strong>
            </div>
            <div>
                <i class="bi bi-geo-alt-fill me-1" style="color:#FFCC3E;"></i>
                <strong><?= esc($kontak['alamat']) ?></strong>
            </div>
        </div>
    </div>

</div>

<?= view('layout/footer') ?>