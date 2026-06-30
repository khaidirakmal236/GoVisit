<?= $this->include('layout/header') ?>

<style>
/* ── HERO ── */
.detail-hero {
    position: relative; height: 420px; overflow: hidden;
    display: flex; align-items: flex-end;
    background: #1A1A2E;
}
.detail-hero img {
    position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    opacity: 0.85;
}
.detail-hero .placeholder {
    position: absolute; inset: 0; display: flex; align-items: center;
    justify-content: center; font-size: 6rem;
}
.detail-hero .overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.75) 0%, rgba(0,0,0,0.1) 60%, transparent 100%);
}
.hero-content {
    position: relative; z-index: 2; padding: 2rem 1.5rem;
    width: 100%; max-width: 1100px; margin: 0 auto;
}
.back-btn {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,0.15); backdrop-filter: blur(6px);
    color: white; padding: 7px 14px; border-radius: 999px;
    font-size: 13px; font-weight: 500; text-decoration: none;
    border: 1px solid rgba(255,255,255,0.2);
    margin-bottom: 1.5rem; transition: background 0.2s;
}
.back-btn:hover { background: rgba(255,255,255,0.25); }
.hero-badge { margin-bottom: 8px; }
.hero-title { font-size: clamp(1.6rem, 4vw, 2.4rem); font-weight: 800; color: white; margin-bottom: 8px; letter-spacing: -0.5px; line-height: 1.2; }
.hero-loc   { font-size: 14px; color: rgba(255,255,255,0.85); display:flex; align-items:center; gap:6px; }
.hero-rating {
    position: absolute; right: 1.5rem; bottom: 2rem; z-index: 2;
    background: rgba(0,0,0,0.6); backdrop-filter: blur(8px);
    color: white; padding: 10px 18px; border-radius: 12px;
    text-align: center; border: 1px solid rgba(255,255,255,0.15);
}
.rating-num  { font-size: 2rem; font-weight: 800; color: #FBBF24; line-height: 1; }
.rating-sub  { font-size: 11px; color: rgba(255,255,255,0.7); margin-top: 2px; }

/* ── BODY ── */
.detail-body { max-width: 1100px; margin: 0 auto; padding: 0 1.5rem; }

/* ── INFO CARDS ── */
.info-strip {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(150px,1fr));
    gap: 12px; margin: 1.75rem 0;
}
.info-card {
    background: white; border-radius: 14px; padding: 1rem 1.1rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #F3F4F6;
}
.info-card .lbl { font-size: 11px; font-weight: 700; color: #9CA3AF; text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 6px; }
.info-card .val { font-size: 14px; font-weight: 700; color: #1A1A2E; }

/* ── SECTION TITLES ── */
.sec-title { font-size: 1.1rem; font-weight: 800; color: #1A1A2E; margin-bottom: 1rem; display:flex; align-items:center; gap:8px; }

/* ── MAPS BTN ── */
.maps-btn {
    display: inline-flex; align-items: center; gap: 10px;
    background: linear-gradient(135deg, #1D9E75, #0F6E56);
    color: white; padding: 13px 26px; border-radius: 12px;
    font-size: 14px; font-weight: 700; text-decoration: none;
    box-shadow: 0 4px 16px rgba(29,158,117,0.3); transition: transform 0.2s, box-shadow 0.2s;
    margin-bottom: 2rem;
}
.maps-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(29,158,117,0.4); }

/* ── GALERI ── */
.gallery-grid {
    display: grid; grid-template-columns: repeat(auto-fill, minmax(180px,1fr));
    gap: 10px; margin-bottom: 2.5rem;
}
.gallery-item {
    border-radius: 12px; overflow: hidden; height: 140px;
    background: #E5E7EB; cursor: pointer; transition: transform 0.2s;
}
.gallery-item:hover { transform: scale(1.02); }
.gallery-item img { width: 100%; height: 100%; object-fit: cover; }

/* ── ULASAN CARD ── */
.ulasan-card {
    background: white; border-radius: 14px; padding: 1.25rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 12px;
    border: 1px solid #F3F4F6;
}
.avatar {
    width: 40px; height: 40px; background: linear-gradient(135deg, #1D9E75, #0F6E56);
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    font-weight: 800; color: white; font-size: 16px; flex-shrink: 0;
}
.star-filled { color: #FBBF24; }
.star-empty  { color: #E5E7EB; }

/* ── FORM ULASAN ── */
.review-form {
    background: white; border-radius: 16px; padding: 1.75rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.07); border: 1px solid #F3F4F6;
    margin-bottom: 3rem;
}
.form-lbl { font-size: 13px; font-weight: 700; color: #374151; display: block; margin-bottom: 7px; }
.form-input {
    width: 100%; padding: 12px 14px; border: 1.5px solid #E5E7EB;
    border-radius: 10px; font-size: 14px; font-family: inherit;
    outline: none; transition: border-color 0.2s, box-shadow 0.2s; color: #1A1A2E;
}
.form-input:focus { border-color: #1D9E75; box-shadow: 0 0 0 3px rgba(29,158,117,0.1); }

/* Star picker */
.star-picker { display: flex; gap: 6px; margin-bottom: 4px; }
.star-picker input[type="radio"] { display: none; }
.star-picker label {
    font-size: 1.8rem; cursor: pointer; color: #E5E7EB;
    transition: color 0.15s, transform 0.15s; line-height: 1;
}
.star-picker label:hover,
.star-picker label:hover ~ label,
.star-picker input:checked ~ label { color: #E5E7EB; }
.star-picker input:checked + label,
.star-picker label:hover { color: #FBBF24; transform: scale(1.1); }

/* RTL trick for star hover */
.star-picker { flex-direction: row-reverse; justify-content: flex-end; }
.star-picker label:hover,
.star-picker label:hover ~ label { color: #FBBF24; }

.submit-btn {
    background: linear-gradient(135deg, #1D9E75, #0F6E56);
    color: white; border: none; padding: 13px 28px; border-radius: 10px;
    font-size: 14px; font-weight: 700; cursor: pointer; font-family: inherit;
    transition: transform 0.2s, box-shadow 0.2s;
    box-shadow: 0 4px 14px rgba(29,158,117,0.3);
}
.submit-btn:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(29,158,117,0.4); }
</style>

<main>

<!-- ── HERO ── -->
<section class="detail-hero">
    <?php if (!empty($foto[0]['url_foto'])): ?>
        <img src="<?= base_url($foto[0]['url_foto']) ?>" alt="<?= esc($tempat['nama_tempat']) ?>">
    <?php else: ?>
        <div class="placeholder" style="background:<?= $tempat['kategori']==='wisata' ? '#C0DD97' : ($tempat['kategori']==='cafe' ? '#FAC775' : '#CECBF6') ?>;">
            <?= $tempat['kategori']==='wisata' ? '🏔️' : ($tempat['kategori']==='cafe' ? '☕' : '💎') ?>
        </div>
    <?php endif; ?>
    <div class="overlay"></div>

    <div class="hero-content">
        <a href="javascript:history.back()" class="back-btn">← Kembali</a>
        <div class="hero-badge">
            <span class="badge badge-<?= $tempat['kategori']==='hidden_gem' ? 'gem' : $tempat['kategori'] ?>">
                <?= $tempat['kategori']==='hidden_gem' ? '💎 Hidden Gem' : ($tempat['kategori']==='wisata' ? '🏔️ Wisata' : '☕ Cafe') ?>
            </span>
        </div>
        <h1 class="hero-title"><?= esc($tempat['nama_tempat']) ?></h1>
        <p class="hero-loc">📍 <?= esc($tempat['alamat']) ?></p>
    </div>

    <div class="hero-rating">
        <div class="rating-num">⭐ <?= number_format($tempat['rating_avg'], 1) ?></div>
        <div class="rating-sub"><?= count($ulasan) ?> ulasan</div>
    </div>
</section>

<!-- ── BODY ── -->
<div class="detail-body">

    <!-- INFO STRIP -->
    <?php $s = cek_status_buka($tempat['jam_buka']); ?>
    <div class="info-strip">
        <div class="info-card">
            <div class="lbl">🕐 Jam Buka</div>
            <div class="val"><?= esc($tempat['jam_buka'] ?? '-') ?></div>
            <div style="margin-top:6px; display:inline-flex; align-items:center; gap:5px; background:<?= $s['status']==='buka' ? '#DCFCE7' : ($s['status']==='tutup' ? '#FEE2E2' : '#F3F4F6') ?>; padding:3px 10px; border-radius:999px;">
                <span style="width:7px;height:7px;border-radius:50%;background:<?= $s['warna'] ?>;display:inline-block;"></span>
                <span style="font-size:11px;font-weight:700;color:<?= $s['warna'] ?>;"><?= $s['label'] ?></span>
            </div>
        </div>
        <div class="info-card">
            <div class="lbl">🏷️ Kategori</div>
            <div class="val"><?= ucfirst(str_replace('_',' ',$tempat['kategori'])) ?></div>
        </div>
        <div class="info-card">
            <div class="lbl">⭐ Rating</div>
            <div class="val" style="color:#BA7517;"><?= number_format($tempat['rating_avg'],1) ?> / 5.0</div>
        </div>
        <div class="info-card">
            <div class="lbl">💬 Ulasan</div>
            <div class="val"><?= count($ulasan) ?> ulasan</div>
        </div>
    </div>

    <!-- DESKRIPSI -->
    <div style="background:white; border-radius:16px; padding:1.5rem; box-shadow:0 2px 12px rgba(0,0,0,0.05); margin-bottom:1.5rem; border:1px solid #F3F4F6;">
        <div class="sec-title">📝 Tentang Tempat Ini</div>
        <p style="font-size:14px; color:#4B5563; line-height:1.8;"><?= nl2br(esc($tempat['deskripsi'] ?? 'Belum ada deskripsi.')) ?></p>
    </div>

    <!-- ACTION BUTTONS -->
    <div style="display:flex; gap:12px; flex-wrap:wrap; margin-bottom:2rem;">
        <?php if (!empty($tempat['maps_link'])): ?>
        <a href="<?= esc($tempat['maps_link']) ?>" target="_blank" class="maps-btn" style="margin-bottom:0;">
            🗺️ Lihat di Google Maps
        </a>
        <?php endif; ?>

        <?php
            $shareText = 'Cek ' . $tempat['nama_tempat'] . ' di goVisit! 📍 ' . $tempat['alamat'] . ' — ' . current_url();
            $waUrl = 'https://wa.me/?text=' . rawurlencode($shareText);
        ?>
        <a href="<?= $waUrl ?>" target="_blank"
           style="display:inline-flex; align-items:center; gap:10px; background:#25D366; color:white; padding:13px 26px; border-radius:12px; font-size:14px; font-weight:700; text-decoration:none; box-shadow:0 4px 16px rgba(37,211,102,0.3); transition:transform 0.2s, box-shadow 0.2s;"
           onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 24px rgba(37,211,102,0.4)'"
           onmouseout="this.style.transform='';this.style.boxShadow='0 4px 16px rgba(37,211,102,0.3)'">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Share ke WhatsApp
        </a>

        <button onclick="copyLink()" id="copyBtn"
            style="display:inline-flex; align-items:center; gap:8px; background:#F3F4F6; color:#374151; border:none; padding:13px 22px; border-radius:12px; font-size:14px; font-weight:700; cursor:pointer; font-family:inherit; transition:background 0.2s;"
            onmouseover="this.style.background='#E5E7EB'" onmouseout="this.style.background='#F3F4F6'">
            🔗 Salin Link
        </button>
    </div>

    <!-- GALERI -->
    <?php if (!empty($foto)): ?>
    <div class="sec-title">📷 Galeri Foto</div>
    <div class="gallery-grid">
        <?php foreach ($foto as $f): ?>
        <?php if (!empty($f['url_foto'])): ?>
        <div class="gallery-item">
            <img src="<?= base_url($f['url_foto']) ?>" alt="<?= esc($f['keterangan'] ?? '') ?>">
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- ULASAN LIST -->
    <div class="sec-title">💬 Ulasan Pengunjung <span style="font-size:13px; font-weight:400; color:#9CA3AF;">(<?= count($ulasan) ?>)</span></div>

    <?php if (!empty($ulasan)): ?>
        <?php foreach ($ulasan as $u): ?>
        <div class="ulasan-card">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
                <div style="display:flex; align-items:center; gap:12px;">
                    <div class="avatar"><?= strtoupper(substr($u['nama_pengunjung'],0,1)) ?></div>
                    <div>
                        <div style="font-size:14px; font-weight:700; color:#1A1A2E;"><?= esc($u['nama_pengunjung']) ?></div>
                        <div style="font-size:11px; color:#9CA3AF;"><?= date('d M Y', strtotime($u['created_at'])) ?></div>
                    </div>
                </div>
                <div style="font-size:18px;">
                    <?php for ($i=1; $i<=5; $i++): ?>
                        <span class="<?= $i <= $u['rating'] ? 'star-filled' : 'star-empty' ?>">★</span>
                    <?php endfor; ?>
                </div>
            </div>
            <p style="font-size:14px; color:#4B5563; line-height:1.6; margin:0;"><?= esc($u['komentar']) ?></p>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
    <div style="text-align:center; padding:2rem; color:#9CA3AF; font-size:14px; background:white; border-radius:14px; margin-bottom:1.5rem;">
        Belum ada ulasan. Jadilah yang pertama! 👇
    </div>
    <?php endif; ?>

    <!-- FORM ULASAN -->
    <div class="review-form">
        <div class="sec-title">✍️ Tulis Ulasan</div>
        <form action="<?= base_url('ulasan/simpan') ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="id_tempat" value="<?= $tempat['id'] ?>">
            <input type="hidden" name="rating" id="ratingValue" value="">

            <div style="margin-bottom:16px;">
                <label class="form-lbl">Nama Kamu</label>
                <input type="text" name="nama_pengunjung" placeholder="Masukkan nama kamu" required class="form-input">
            </div>

            <div style="margin-bottom:16px;">
                <label class="form-lbl">Rating</label>
                <div class="star-picker" id="starPicker">
                    <input type="radio" id="s5" name="star" value="5"><label for="s5" title="5">★</label>
                    <input type="radio" id="s4" name="star" value="4"><label for="s4" title="4">★</label>
                    <input type="radio" id="s3" name="star" value="3"><label for="s3" title="3">★</label>
                    <input type="radio" id="s2" name="star" value="2"><label for="s2" title="2">★</label>
                    <input type="radio" id="s1" name="star" value="1"><label for="s1" title="1">★</label>
                </div>
                <div style="font-size:12px; color:#9CA3AF; margin-top:4px;" id="ratingText">Pilih rating</div>
            </div>

            <div style="margin-bottom:20px;">
                <label class="form-lbl">Komentar</label>
                <textarea name="komentar" rows="4" placeholder="Ceritakan pengalamanmu mengunjungi tempat ini..." required class="form-input" style="resize:vertical;"></textarea>
            </div>

            <button type="submit" class="submit-btn">🚀 Kirim Ulasan</button>
        </form>
    </div>

</div>
</main>

<script>
const labels = ['','Buruk','Kurang','Cukup','Bagus','Sangat Bagus! 🔥'];
document.querySelectorAll('#starPicker input').forEach(radio => {
    radio.addEventListener('change', function() {
        document.getElementById('ratingValue').value = this.value;
        document.getElementById('ratingText').textContent = labels[this.value];
    });
});

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        const btn = document.getElementById('copyBtn');
        btn.textContent = '✅ Link Tersalin!';
        btn.style.background = '#DCFCE7';
        btn.style.color = '#16A34A';
        setTimeout(() => {
            btn.innerHTML = '🔗 Salin Link';
            btn.style.background = '#F3F4F6';
            btn.style.color = '#374151';
        }, 2000);
    });
}
</script>

<?= $this->include('layout/footer') ?>
