<?= $this->include('layout/header') ?>

<style>
/* ── PAGE HEADER ── */
.exp-hero {
    background: linear-gradient(135deg, #0F6E56 0%, #1D9E75 60%, #5DCAA5 100%);
    padding: 3rem 1.5rem 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.exp-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='20'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.exp-hero .container { position: relative; }
.exp-hero h1 { font-size: clamp(1.6rem, 4vw, 2.4rem); font-weight: 800; color: white; margin-bottom: 8px; letter-spacing: -0.5px; }
.exp-hero p  { color: rgba(255,255,255,0.85); font-size: 15px; margin-bottom: 1.75rem; }

/* ── SEARCH BAR ── */
.search-wrap {
    display: flex; gap: 10px; max-width: 640px; margin: 0 auto;
    flex-wrap: wrap; justify-content: center;
}
.search-input-wrap { position: relative; flex: 1; min-width: 220px; }
.search-input-wrap svg { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #9CA3AF; width: 16px; height: 16px; }
.search-input {
    width: 100%; padding: 13px 16px 13px 42px;
    border: none; border-radius: 12px; font-size: 14px;
    font-family: inherit; outline: none;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    color: #1A1A2E;
}
.search-btn {
    background: #BA7517; color: white; border: none;
    padding: 13px 22px; border-radius: 12px; font-size: 14px;
    font-weight: 700; cursor: pointer; font-family: inherit;
    white-space: nowrap; transition: background 0.2s;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
}
.search-btn:hover { background: #9A6010; }

/* ── STICKY FILTER BAR ── */
.filter-bar {
    background: white; border-bottom: 1px solid #E5E7EB;
    padding: 0.85rem 1.5rem; position: sticky; top: 64px; z-index: 50;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.filter-bar .container { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
.filter-label { font-size: 13px; color: #9CA3AF; font-weight: 500; }

/* ── FILTER CHIPS ── */
.chip {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 16px; border-radius: 999px; font-size: 13px; font-weight: 600;
    cursor: pointer; border: 2px solid transparent;
    text-decoration: none; transition: all 0.2s; white-space: nowrap;
}
.chip-all     { background: #F3F4F6; color: #6B7280; border-color: #E5E7EB; }
.chip-wisata  { background: #EAF3DE; color: #3B6D11; border-color: #EAF3DE; }
.chip-cafe    { background: #FAEEDA; color: #633806; border-color: #FAEEDA; }
.chip-gem     { background: #EEEDFE; color: #3C3489; border-color: #EEEDFE; }

.chip-all.active,   .chip-all:hover   { background: #1A1A2E; color: white; border-color: #1A1A2E; }
.chip-wisata.active, .chip-wisata:hover { background: #3B6D11; color: white; border-color: #3B6D11; }
.chip-cafe.active,  .chip-cafe:hover   { background: #633806; color: white; border-color: #633806; }
.chip-gem.active,   .chip-gem:hover    { background: #3C3489; color: white; border-color: #3C3489; }

/* ── CUSTOM DROPDOWN ── */
.custom-select { position: relative; }
.custom-select-btn {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 7px 14px; border-radius: 12px; font-size: 13px; font-weight: 600;
    cursor: pointer; border: 2px solid #E5E7EB; background: white;
    color: #374151; font-family: inherit; min-width: 160px;
    justify-content: space-between; transition: border-color 0.2s, box-shadow 0.2s;
    user-select: none;
}
.custom-select-btn:hover, .custom-select-btn.open {
    border-color: #1D9E75; box-shadow: 0 0 0 3px rgba(29,158,117,0.1);
}
.custom-select-btn .arrow {
    transition: transform 0.2s; color: #9CA3AF; font-size: 10px; margin-left: auto;
}
.custom-select-btn.open .arrow { transform: rotate(180deg); }

.custom-dropdown {
    position: absolute; top: calc(100% + 8px); left: 0; min-width: 200px;
    background: white; border-radius: 14px; padding: 6px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.12); z-index: 200;
    display: none; border: 1px solid #E5E7EB;
    animation: dropIn 0.15s ease;
}
.custom-dropdown.show { display: block; }
@keyframes dropIn {
    from { opacity: 0; transform: translateY(-6px); }
    to   { opacity: 1; transform: translateY(0); }
}

.dropdown-item {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 12px; border-radius: 10px; cursor: pointer;
    font-size: 13px; font-weight: 600; color: #374151;
    transition: background 0.15s; text-decoration: none;
}
.dropdown-item:hover { background: #F3F4F6; }
.dropdown-item.selected { background: #E1F5EE; color: #0F6E56; }

.dropdown-item .icon {
    width: 30px; height: 30px; border-radius: 8px;
    display: flex; align-items: center; justify-content: center; font-size: 15px;
    flex-shrink: 0;
}
.icon-all    { background: #F3F4F6; }
.icon-wisata { background: #EAF3DE; }
.icon-cafe   { background: #FAEEDA; }
.icon-gem    { background: #EEEDFE; }

/* ── RESET LINK ── */
.reset-link { font-size: 13px; color: #9CA3AF; text-decoration: none; padding: 4px 8px; border-radius: 6px; transition: color 0.2s; }
.reset-link:hover { color: #EF4444; }

/* ── RESULT HEADER ── */
.result-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 8px; }
.result-count  { font-size: 14px; color: #6B7280; }
.result-count strong { color: #1A1A2E; }

/* ── CARDS ── */
.cards-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.25rem; }

.place-card {
    background: white; border-radius: 16px; overflow: hidden;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    transition: transform 0.25s, box-shadow 0.25s;
    text-decoration: none; color: inherit; display: block;
    border: 1px solid rgba(0,0,0,0.04);
}
.place-card:hover { transform: translateY(-5px); box-shadow: 0 12px 32px rgba(0,0,0,0.12); }

.card-img {
    height: 180px; overflow: hidden; position: relative;
    display: flex; align-items: center; justify-content: center; font-size: 3rem;
}
.card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; }
.place-card:hover .card-img img { transform: scale(1.05); }

.card-kategori-strip {
    position: absolute; top: 12px; left: 12px;
}
.card-rating-strip {
    position: absolute; top: 12px; right: 12px;
    background: rgba(0,0,0,0.55); backdrop-filter: blur(4px);
    color: white; font-size: 12px; font-weight: 700;
    padding: 4px 10px; border-radius: 999px;
}

.card-body { padding: 1rem 1.1rem 1.1rem; }
.card-name { font-size: 16px; font-weight: 700; color: #1A1A2E; margin-bottom: 5px; line-height: 1.3; }
.card-meta { font-size: 12px; color: #6B7280; display: flex; align-items: center; gap: 5px; margin-bottom: 3px; }

/* ── EMPTY STATE ── */
.empty-state { text-align: center; padding: 5rem 1rem; }
.empty-state .icon { font-size: 4rem; margin-bottom: 1rem; opacity: 0.6; }
.empty-state h3 { font-size: 1.3rem; color: #1A1A2E; margin-bottom: 8px; }
.empty-state p  { color: #6B7280; font-size: 14px; margin-bottom: 1.5rem; }
.empty-state a  { background: #1D9E75; color: white; padding: 11px 24px; border-radius: 10px; font-size: 14px; font-weight: 600; text-decoration: none; }
</style>

<main>

<!-- ── HERO ── -->
<section class="exp-hero">
    <div class="container">
        <h1>Eksplorasi Tempat</h1>
        <p>Temukan wisata, cafe, dan hidden gem terbaik di Palu</p>

        <form method="GET" action="<?= base_url('eksplorasi') ?>" class="search-wrap" id="expSearchForm">
            <input type="hidden" name="kategori" id="hiddenKategori" value="<?= esc($kategori ?? '') ?>">
            <div class="search-input-wrap ac-wrap">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);width:16px;height:16px;color:#9CA3AF;pointer-events:none;z-index:1;"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" name="q" id="expSearchInput" value="<?= esc($keyword ?? '') ?>"
                       placeholder="Cari tempat di Palu..." class="search-input" autocomplete="off">
            </div>
            <button type="submit" class="search-btn">🔍 Cari</button>
        </form>
    </div>
</section>

<!-- ── FILTER BAR ── -->
<section class="filter-bar">
    <div class="container">
        <span class="filter-label">Filter:</span>

        <a href="<?= base_url('eksplorasi' . (!empty($keyword) ? '?q='.urlencode($keyword) : '')) ?>"
           class="chip chip-all <?= empty($kategori) ? 'active' : '' ?>">
            🗺️ Semua
        </a>
        <a href="<?= base_url('eksplorasi?kategori=wisata' . (!empty($keyword) ? '&q='.urlencode($keyword) : '')) ?>"
           class="chip chip-wisata <?= ($kategori ?? '') === 'wisata' ? 'active' : '' ?>">
            🏔️ Wisata
        </a>
        <a href="<?= base_url('eksplorasi?kategori=cafe' . (!empty($keyword) ? '&q='.urlencode($keyword) : '')) ?>"
           class="chip chip-cafe <?= ($kategori ?? '') === 'cafe' ? 'active' : '' ?>">
            ☕ Cafe
        </a>
        <a href="<?= base_url('eksplorasi?kategori=hidden_gem' . (!empty($keyword) ? '&q='.urlencode($keyword) : '')) ?>"
           class="chip chip-gem <?= ($kategori ?? '') === 'hidden_gem' ? 'active' : '' ?>">
            💎 Hidden Gem
        </a>

        <?php if (!empty($keyword) || !empty($kategori)): ?>
        <a href="<?= base_url('eksplorasi') ?>" class="reset-link">✕ Reset</a>
        <?php endif; ?>
    </div>
</section>

<!-- ── HASIL ── -->
<section style="padding:2rem 1.5rem;">
    <div class="container">

        <div class="result-header">
            <p class="result-count">
                Menampilkan <strong><?= count($tempat) ?> tempat</strong>
                <?php if (!empty($keyword)): ?>untuk "<strong><?= esc($keyword) ?></strong>"<?php endif; ?>
                <?php if (!empty($kategori)): ?>· <strong><?= ucfirst(str_replace('_',' ',$kategori)) ?></strong><?php endif; ?>
            </p>
        </div>

        <?php if (!empty($tempat)): ?>
        <div class="cards-grid">
            <?php foreach ($tempat as $t): ?>
            <a href="<?= base_url('tempat/' . $t['id']) ?>" class="place-card">
                <div class="card-img" style="background:<?= $t['kategori']==='wisata' ? '#C0DD97' : ($t['kategori']==='cafe' ? '#FAC775' : '#CECBF6') ?>;">
                    <?php if (!empty($t['foto_utama'])): ?>
                        <img src="<?= base_url('uploads/tempat/' . $t['foto_utama']) ?>" alt="<?= esc($t['nama_tempat']) ?>">
                    <?php else: ?>
                        <?= $t['kategori']==='wisata' ? '🏔️' : ($t['kategori']==='cafe' ? '☕' : '💎') ?>
                    <?php endif; ?>
                    <div class="card-kategori-strip">
                        <span class="badge badge-<?= $t['kategori']==='hidden_gem' ? 'gem' : $t['kategori'] ?>">
                            <?= $t['kategori']==='hidden_gem' ? 'Hidden Gem' : ucfirst($t['kategori']) ?>
                        </span>
                    </div>
                    <div class="card-rating-strip">⭐ <?= number_format($t['rating_avg'],1) ?></div>
                </div>
                <div class="card-body">
                    <h3 class="card-name"><?= esc($t['nama_tempat']) ?></h3>
                    <p class="card-meta">📍 <?= esc($t['alamat']) ?></p>
                    <p class="card-meta">🕐 <?= esc($t['jam_buka'] ?? '-') ?></p>
                    <?php $s = cek_status_buka($t['jam_buka']); ?>
                    <div style="margin-top:8px; display:inline-flex; align-items:center; gap:5px; background:<?= $s['status']==='buka' ? '#DCFCE7' : ($s['status']==='tutup' ? '#FEE2E2' : '#F3F4F6') ?>; padding:3px 10px; border-radius:999px;">
                        <span style="width:7px;height:7px;border-radius:50%;background:<?= $s['warna'] ?>;display:inline-block;flex-shrink:0;"></span>
                        <span style="font-size:11px;font-weight:700;color:<?= $s['warna'] ?>;"><?= $s['label'] ?></span>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

        <?php else: ?>
        <div class="empty-state">
            <div class="icon">🔍</div>
            <h3>Tidak ada hasil</h3>
            <p>Coba kata kunci atau kategori yang berbeda</p>
            <a href="<?= base_url('eksplorasi') ?>">Lihat semua tempat</a>
        </div>
        <?php endif; ?>

    </div>
</section>

</main>

<?= $this->include('layout/footer') ?>
