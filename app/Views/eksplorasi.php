<?= $this->include('layout/header') ?>

<main>

<!-- ── PAGE HEADER ── -->
<section style="background:linear-gradient(135deg, #0F6E56, #1D9E75); padding:2.5rem 1.5rem; text-align:center;">
    <div class="container">
        <h1 style="font-size:2rem; font-weight:700; color:white; margin-bottom:8px;">Eksplorasi Tempat</h1>
        <p style="color:rgba(255,255,255,0.85); font-size:14px;">Temukan wisata, cafe, dan hidden gem terbaik di Palu</p>
    </div>
</section>

<!-- ── SEARCH + FILTER ── -->
<section style="background:white; border-bottom:1px solid #E5E7EB; padding:1rem 1.5rem; position:sticky; top:64px; z-index:50;">
    <div class="container">
        <form method="GET" action="<?= base_url('eksplorasi') ?>" style="display:flex; gap:10px; flex-wrap:wrap; align-items:center;">
            <input
                type="text"
                name="q"
                value="<?= esc($keyword ?? '') ?>"
                placeholder="Cari tempat..."
                style="flex:1; min-width:200px; padding:10px 16px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none;"
                onfocus="this.style.borderColor='#1D9E75'" onblur="this.style.borderColor='#E5E7EB'"
            >
            <select name="kategori" style="padding:10px 16px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none; background:white; cursor:pointer;">
                <option value="" <?= empty($kategori) ? 'selected' : '' ?>>Semua Kategori</option>
                <option value="wisata"     <?= ($kategori ?? '') === 'wisata'     ? 'selected' : '' ?>>🏔️ Wisata</option>
                <option value="cafe"       <?= ($kategori ?? '') === 'cafe'       ? 'selected' : '' ?>>☕ Cafe</option>
                <option value="hidden_gem" <?= ($kategori ?? '') === 'hidden_gem' ? 'selected' : '' ?>>💎 Hidden Gem</option>
            </select>
            <button type="submit" style="background:#1D9E75; color:white; border:none; padding:10px 20px; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; font-family:inherit;">
                🔍 Cari
            </button>
            <?php if (!empty($keyword) || !empty($kategori)): ?>
            <a href="<?= base_url('eksplorasi') ?>" style="color:#6B7280; font-size:13px; text-decoration:none; padding:10px;">✕ Reset</a>
            <?php endif; ?>
        </form>
    </div>
</section>

<!-- ── HASIL ── -->
<section style="padding:2rem 1.5rem;">
    <div class="container">

        <div style="margin-bottom:1.25rem; display:flex; justify-content:space-between; align-items:center;">
            <p style="font-size:14px; color:#6B7280;">
                Menampilkan <strong style="color:#1A1A2E;"><?= count($tempat) ?> tempat</strong>
                <?php if (!empty($keyword)): ?>
                    untuk "<strong><?= esc($keyword) ?></strong>"
                <?php endif; ?>
                <?php if (!empty($kategori)): ?>
                    · kategori <strong><?= ucfirst(str_replace('_', ' ', $kategori)) ?></strong>
                <?php endif; ?>
            </p>
        </div>

        <?php if (!empty($tempat)): ?>
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px,1fr)); gap:1.25rem;">
            <?php foreach ($tempat as $t): ?>
            <a href="<?= base_url('tempat/' . $t['id']) ?>" style="text-decoration:none; color:inherit;">
                <div style="background:white; border-radius:14px; overflow:hidden; box-shadow:0 2px 12px rgba(0,0,0,0.07); display:flex; transition:transform 0.2s, box-shadow 0.2s;"
                    onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 8px 24px rgba(0,0,0,0.12)'"
                    onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(0,0,0,0.07)'">
                    <!-- Thumbnail -->
                    <div style="width:100px; flex-shrink:0; background:<?= $t['kategori'] === 'wisata' ? '#C0DD97' : ($t['kategori'] === 'cafe' ? '#FAC775' : '#CECBF6') ?>; display:flex; align-items:center; justify-content:center; font-size:2rem; overflow:hidden;">
                        <?php if (!empty($t['foto_utama'])): ?>
                            <img src="<?= base_url('uploads/tempat/' . $t['foto_utama']) ?>"
                                 alt="<?= esc($t['nama_tempat']) ?>"
                                 style="width:100%; height:100%; object-fit:cover;">
                        <?php else: ?>
                            <?= $t['kategori'] === 'wisata' ? '🏔️' : ($t['kategori'] === 'cafe' ? '☕' : '💎') ?>
                        <?php endif; ?>
                    </div>
                    <!-- Info -->
                    <div style="padding:1rem; flex:1;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
                            <span class="badge badge-<?= $t['kategori'] === 'hidden_gem' ? 'gem' : $t['kategori'] ?>">
                                <?= $t['kategori'] === 'hidden_gem' ? 'Hidden Gem' : ucfirst($t['kategori']) ?>
                            </span>
                            <span class="star-rating">⭐ <?= number_format($t['rating_avg'], 1) ?></span>
                        </div>
                        <h3 style="font-size:15px; font-weight:700; color:#1A1A2E; margin-bottom:4px;"><?= esc($t['nama_tempat']) ?></h3>
                        <p style="font-size:12px; color:#6B7280; margin-bottom:6px;">📍 <?= esc($t['alamat']) ?></p>
                        <p style="font-size:12px; color:#6B7280;">🕐 <?= esc($t['jam_buka'] ?? '-') ?></p>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

        <?php else: ?>
        <div style="text-align:center; padding:4rem 1rem;">
            <div style="font-size:3rem; margin-bottom:1rem;">🔍</div>
            <h3 style="font-size:1.2rem; color:#1A1A2E; margin-bottom:8px;">Tidak ada hasil</h3>
            <p style="color:#6B7280; font-size:14px;">Coba kata kunci atau kategori yang berbeda</p>
            <a href="<?= base_url('eksplorasi') ?>" style="display:inline-block; margin-top:1rem; background:#1D9E75; color:white; padding:10px 20px; border-radius:8px; font-size:14px; font-weight:600; text-decoration:none;">Lihat semua tempat</a>
        </div>
        <?php endif; ?>

    </div>
</section>

</main>

<?= $this->include('layout/footer') ?>