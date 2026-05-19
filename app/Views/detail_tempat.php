<?= $this->include('layout/header') ?>

<main>

<!-- ── BACK BUTTON ── -->
<div style="background:white; border-bottom:1px solid #E5E7EB; padding:0.75rem 1.5rem;">
    <div class="container">
        <a href="javascript:history.back()" style="font-size:14px; color:#6B7280; text-decoration:none; display:inline-flex; align-items:center; gap:6px;">
            ← Kembali
        </a>
    </div>
</div>

<!-- ── HERO TEMPAT ── -->
<section style="background:<?= $tempat['kategori'] === 'wisata' ? '#C0DD97' : ($tempat['kategori'] === 'cafe' ? '#FAC775' : '#CECBF6') ?>; height:220px; display:flex; align-items:center; justify-content:center; font-size:5rem;">
    <?= $tempat['kategori'] === 'wisata' ? '🏔️' : ($tempat['kategori'] === 'cafe' ? '☕' : '💎') ?>
</section>

<!-- ── INFO UTAMA ── -->
<section style="padding:2rem 1.5rem 1rem;">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:1rem; margin-bottom:1rem;">
            <div>
                <span class="badge badge-<?= $tempat['kategori'] === 'hidden_gem' ? 'gem' : $tempat['kategori'] ?>" style="margin-bottom:8px; display:inline-block;">
                    <?= $tempat['kategori'] === 'hidden_gem' ? '💎 Hidden Gem' : ($tempat['kategori'] === 'wisata' ? '🏔️ Wisata' : '☕ Cafe') ?>
                </span>
                <h1 style="font-size:1.75rem; font-weight:700; color:#1A1A2E; margin-bottom:6px;"><?= esc($tempat['nama_tempat']) ?></h1>
                <p style="font-size:14px; color:#6B7280;">📍 <?= esc($tempat['alamat']) ?></p>
            </div>
            <div style="text-align:right;">
                <div class="star-rating" style="font-size:1.5rem;">⭐ <?= number_format($tempat['rating_avg'], 1) ?></div>
                <div style="font-size:12px; color:#6B7280; margin-top:4px;"><?= count($ulasan) ?> ulasan</div>
            </div>
        </div>

        <!-- Info Grid -->
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(180px,1fr)); gap:1rem; margin-bottom:1.5rem;">
            <div style="background:#F8FAF9; border-radius:10px; padding:1rem;">
                <div style="font-size:11px; color:#6B7280; margin-bottom:4px; font-weight:600; text-transform:uppercase; letter-spacing:0.5px;">Jam Buka</div>
                <div style="font-size:14px; font-weight:600; color:#1A1A2E;">🕐 <?= esc($tempat['jam_buka'] ?? '-') ?></div>
            </div>
            <div style="background:#F8FAF9; border-radius:10px; padding:1rem;">
                <div style="font-size:11px; color:#6B7280; margin-bottom:4px; font-weight:600; text-transform:uppercase; letter-spacing:0.5px;">Kategori</div>
                <div style="font-size:14px; font-weight:600; color:#1A1A2E;"><?= ucfirst(str_replace('_', ' ', $tempat['kategori'])) ?></div>
            </div>
            <div style="background:#F8FAF9; border-radius:10px; padding:1rem;">
                <div style="font-size:11px; color:#6B7280; margin-bottom:4px; font-weight:600; text-transform:uppercase; letter-spacing:0.5px;">Rating</div>
                <div style="font-size:14px; font-weight:600; color:#BA7517;">⭐ <?= number_format($tempat['rating_avg'], 1) ?> / 5.0</div>
            </div>
        </div>

        <!-- Deskripsi -->
        <div style="margin-bottom:1.5rem;">
            <h2 style="font-size:1rem; font-weight:700; color:#1A1A2E; margin-bottom:8px;">Tentang Tempat Ini</h2>
            <p style="font-size:14px; color:#4B5563; line-height:1.7;"><?= esc($tempat['deskripsi'] ?? 'Belum ada deskripsi.') ?></p>
        </div>

        <!-- Tombol Maps -->
        <?php if (!empty($tempat['maps_link'])): ?>
        <a href="<?= esc($tempat['maps_link']) ?>" target="_blank"
           style="display:inline-flex; align-items:center; gap:8px; background:#1D9E75; color:white; padding:12px 24px; border-radius:10px; font-size:14px; font-weight:600; text-decoration:none; margin-bottom:2rem;">
            🗺️ Lihat di Google Maps
        </a>
        <?php endif; ?>
    </div>
</section>

<!-- ── GALERI FOTO ── -->
<?php if (!empty($foto)): ?>
<section style="padding:0 1.5rem 2rem;">
    <div class="container">
        <h2 style="font-size:1rem; font-weight:700; color:#1A1A2E; margin-bottom:1rem;">Galeri Foto</h2>
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(160px,1fr)); gap:10px;">
            <?php foreach ($foto as $f): ?>
            <div style="border-radius:10px; overflow:hidden; background:#E5E7EB; height:120px; display:flex; align-items:center; justify-content:center; color:#9CA3AF; font-size:12px;">
                <?php if (!empty($f['url_foto'])): ?>
                    <img src="<?= base_url($f['url_foto']) ?>" alt="<?= esc($f['keterangan'] ?? '') ?>" style="width:100%; height:100%; object-fit:cover;">
                <?php else: ?>
                    📷 Foto
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ── ULASAN ── -->
<section style="padding:0 1.5rem 3rem;">
    <div class="container">
        <h2 style="font-size:1rem; font-weight:700; color:#1A1A2E; margin-bottom:1rem;">
            Ulasan Pengunjung
            <span style="font-size:13px; font-weight:400; color:#6B7280;">(<?= count($ulasan) ?>)</span>
        </h2>

        <?php if (!empty($ulasan)): ?>
        <div style="display:flex; flex-direction:column; gap:12px; margin-bottom:2rem;">
            <?php foreach ($ulasan as $u): ?>
            <div style="background:white; border-radius:12px; padding:1.25rem; box-shadow:0 1px 8px rgba(0,0,0,0.06);">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <div style="width:36px; height:36px; background:#E1F5EE; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:700; color:#1D9E75; font-size:14px;">
                            <?= strtoupper(substr($u['nama_pengunjung'], 0, 1)) ?>
                        </div>
                        <div>
                            <div style="font-size:14px; font-weight:600; color:#1A1A2E;"><?= esc($u['nama_pengunjung']) ?></div>
                            <div style="font-size:11px; color:#9CA3AF;"><?= date('d M Y', strtotime($u['created_at'])) ?></div>
                        </div>
                    </div>
                    <div class="star-rating">
                        <?= str_repeat('⭐', $u['rating']) ?>
                    </div>
                </div>
                <p style="font-size:14px; color:#4B5563; line-height:1.6;"><?= esc($u['komentar']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <p style="color:#6B7280; font-size:14px; margin-bottom:2rem;">Belum ada ulasan untuk tempat ini.</p>
        <?php endif; ?>

        <!-- Form Tambah Ulasan -->
        <div style="background:white; border-radius:14px; padding:1.5rem; box-shadow:0 2px 12px rgba(0,0,0,0.07);">
            <h3 style="font-size:1rem; font-weight:700; color:#1A1A2E; margin-bottom:1rem;">Tulis Ulasan</h3>
            <form action="<?= base_url('ulasan/simpan') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="id_tempat" value="<?= $tempat['id'] ?>">

                <div style="margin-bottom:12px;">
                    <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">Nama</label>
                    <input type="text" name="nama_pengunjung" placeholder="Nama kamu" required
                        style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none;"
                        onfocus="this.style.borderColor='#1D9E75'" onblur="this.style.borderColor='#E5E7EB'">
                </div>

                <div style="margin-bottom:12px;">
                    <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">Rating</label>
                    <select name="rating" required style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none; background:white;">
                        <option value="">Pilih rating</option>
                        <option value="5">⭐⭐⭐⭐⭐ — Sangat Bagus</option>
                        <option value="4">⭐⭐⭐⭐ — Bagus</option>
                        <option value="3">⭐⭐⭐ — Cukup</option>
                        <option value="2">⭐⭐ — Kurang</option>
                        <option value="1">⭐ — Buruk</option>
                    </select>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">Komentar</label>
                    <textarea name="komentar" rows="3" placeholder="Ceritakan pengalamanmu..."
                        style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none; resize:vertical;"
                        onfocus="this.style.borderColor='#1D9E75'" onblur="this.style.borderColor='#E5E7EB'"></textarea>
                </div>

                <button type="submit" style="background:#1D9E75; color:white; border:none; padding:12px 24px; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; font-family:inherit;">
                    Kirim Ulasan
                </button>
            </form>
        </div>

    </div>
</section>

</main>

<?= $this->include('layout/footer') ?>