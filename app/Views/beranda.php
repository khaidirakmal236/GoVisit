<?= $this->include('layout/header') ?>

<main>

<!-- ── HERO ── -->
<section style="background: linear-gradient(135deg, #0F6E56 0%, #1D9E75 60%, #5DCAA5 100%); padding: 5rem 1.5rem; text-align: center; position: relative; overflow: hidden;">
    <div style="position:absolute;inset:0;background:url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2220%22 cy=%2220%22 r=%2240%22 fill=%22rgba(255,255,255,0.03)%22/><circle cx=%2280%22 cy=%2280%22 r=%2260%22 fill=%22rgba(255,255,255,0.03)%22/></svg>');"></div>
    <div class="container" style="position:relative">
        <div style="display:inline-block; background:rgba(255,255,255,0.15); color:white; padding:6px 16px; border-radius:20px; font-size:13px; font-weight:500; margin-bottom:1rem;">
            🌴 Wisata Kota Palu & Sekitarnya
        </div>
        <h1 style="font-size:clamp(2rem,5vw,3.2rem); font-weight:700; color:white; margin-bottom:1rem; line-height:1.2;">
            Jelajahi Keindahan<br><span style="color:#9FE1CB;">Kota Palu</span>
        </h1>
        <p style="color:rgba(255,255,255,0.85); font-size:1.1rem; margin-bottom:2rem; max-width:500px; margin-left:auto; margin-right:auto;">
            Temukan destinasi wisata, cafe hits, dan hidden gem terbaik di Palu
        </p>
        <form action="<?= base_url('eksplorasi') ?>" method="GET" style="display:flex; gap:8px; max-width:480px; margin:0 auto;">
            <input
                type="text"
                name="q"
                placeholder="Cari tempat di Palu..."
                style="flex:1; padding:14px 20px; border-radius:10px; border:none; font-size:14px; font-family:inherit; outline:none; box-shadow:0 4px 20px rgba(0,0,0,0.15);"
            >
            <button type="submit" style="background:#BA7517; color:white; border:none; padding:14px 24px; border-radius:10px; font-size:14px; font-weight:600; cursor:pointer; white-space:nowrap;">
                🔍 Cari
            </button>
        </form>
    </div>
</section>

<!-- ── FILTER KATEGORI ── -->
<section style="background:white; border-bottom:1px solid #E5E7EB; padding:1rem 1.5rem;">
    <div class="container" style="display:flex; gap:10px; flex-wrap:wrap; align-items:center;">
        <span style="font-size:13px; color:#6B7280; font-weight:500; margin-right:4px;">Filter:</span>
        <a href="<?= base_url('eksplorasi') ?>" style="text-decoration:none; padding:7px 16px; border-radius:20px; font-size:13px; font-weight:500; background:#1D9E75; color:white;">Semua</a>
        <a href="<?= base_url('eksplorasi?kategori=wisata') ?>" style="text-decoration:none; padding:7px 16px; border-radius:20px; font-size:13px; font-weight:500; background:#EAF3DE; color:#3B6D11;">🏔️ Wisata</a>
        <a href="<?= base_url('eksplorasi?kategori=cafe') ?>" style="text-decoration:none; padding:7px 16px; border-radius:20px; font-size:13px; font-weight:500; background:#FAEEDA; color:#633806;">☕ Cafe</a>
        <a href="<?= base_url('hidden-gem') ?>" style="text-decoration:none; padding:7px 16px; border-radius:20px; font-size:13px; font-weight:500; background:#EEEDFE; color:#3C3489;">💎 Hidden Gem</a>
    </div>
</section>

<!-- ── REKOMENDASI ── -->
<section style="padding:3rem 1.5rem;">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
            <div>
                <h2 style="font-size:1.5rem; font-weight:700; color:#1A1A2E;">Rekomendasi Untukmu</h2>
                <p style="color:#6B7280; font-size:14px; margin-top:4px;">Destinasi terpopuler di Kota Palu</p>
            </div>
            <a href="<?= base_url('eksplorasi') ?>" style="font-size:13px; color:#1D9E75; font-weight:600; text-decoration:none;">Lihat semua →</a>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px,1fr)); gap:1.25rem;">
            <?php if (!empty($tempat)): ?>
                <?php foreach ($tempat as $t): ?>
                <a href="<?= base_url('tempat/' . $t['id']) ?>" style="text-decoration:none; color:inherit;">
                    <div style="background:white; border-radius:14px; overflow:hidden; box-shadow:0 2px 16px rgba(0,0,0,0.07); transition:transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 24px rgba(0,0,0,0.12)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 16px rgba(0,0,0,0.07)'">

                        <!-- Gambar / Placeholder -->
                        <div style="height:160px; background:<?= $t['kategori'] === 'wisata' ? '#C0DD97' : ($t['kategori'] === 'cafe' ? '#FAC775' : '#CECBF6') ?>; overflow:hidden; display:flex; align-items:center; justify-content:center; font-size:3rem;">
                            <?php if (!empty($t['foto_utama'])): ?>
                                <img src="<?= base_url('uploads/tempat/' . $t['foto_utama']) ?>"
                                     alt="<?= esc($t['nama_tempat']) ?>"
                                     style="width:100%; height:160px; object-fit:cover;">
                            <?php else: ?>
                                <?= $t['kategori'] === 'wisata' ? '🏔️' : ($t['kategori'] === 'cafe' ? '☕' : '💎') ?>
                            <?php endif; ?>
                        </div>

                        <div style="padding:1rem;">
                            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:6px;">
                                <span class="badge badge-<?= $t['kategori'] === 'hidden_gem' ? 'gem' : $t['kategori'] ?>">
                                    <?= $t['kategori'] === 'hidden_gem' ? 'Hidden Gem' : ucfirst($t['kategori']) ?>
                                </span>
                                <span class="star-rating">⭐ <?= number_format($t['rating_avg'], 1) ?></span>
                            </div>
                            <h3 style="font-size:15px; font-weight:700; color:#1A1A2E; margin-bottom:4px;"><?= esc($t['nama_tempat']) ?></h3>
                            <p style="font-size:12px; color:#6B7280;">📍 <?= esc($t['alamat']) ?></p>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="color:#6B7280; font-size:14px;">Belum ada data tempat.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ── HIDDEN GEM HIGHLIGHT ── -->
<section style="background:linear-gradient(135deg, #EEEDFE, #F5F3FF); padding:3rem 1.5rem;">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
            <div>
                <h2 style="font-size:1.5rem; font-weight:700; color:#3C3489;">💎 Hidden Gem Pilihan</h2>
                <p style="color:#534AB7; font-size:14px; margin-top:4px;">Spot tersembunyi yang wajib kamu kunjungi</p>
            </div>
            <a href="<?= base_url('hidden-gem') ?>" style="font-size:13px; color:#7F77DD; font-weight:600; text-decoration:none;">Lihat semua →</a>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(260px,1fr)); gap:1rem;">
            <?php if (!empty($hidden_gem)): ?>
                <?php foreach ($hidden_gem as $gem): ?>
                <a href="<?= base_url('tempat/' . $gem['id']) ?>" style="text-decoration:none;">
                    <div style="background:white; border-radius:12px; padding:1.25rem; display:flex; align-items:center; gap:1rem; box-shadow:0 2px 12px rgba(127,119,221,0.12); transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform=''">
                        <div style="width:48px; height:48px; background:#EEEDFE; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.5rem; flex-shrink:0;">💎</div>
                        <div style="flex:1;">
                            <div style="font-size:14px; font-weight:700; color:#3C3489;"><?= esc($gem['nama_tempat']) ?></div>
                            <div style="font-size:12px; color:#7F77DD; margin-top:2px;">📍 <?= esc($gem['alamat']) ?></div>
                        </div>
                        <span class="star-rating" style="font-size:12px;">⭐ <?= number_format($gem['rating_avg'], 1) ?></span>
                    </div>
                </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="color:#7F77DD; font-size:14px;">Belum ada hidden gem.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

</main>

<?= $this->include('layout/footer') ?>