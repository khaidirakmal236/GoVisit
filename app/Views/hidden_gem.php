<?= $this->include('layout/header') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/hidden_gem.css') ?>">

<main>

<!-- ── HERO ── -->
<section class="hg-hero">
    <div class="hg-hero-bg"></div>
    <div class="container hg-hero-content">
        <div class="hg-hero-icon">💎</div>
        <h1 class="hg-hero-title">Hidden Gem Palu</h1>
        <p class="hg-hero-desc">
            Spot-spot tersembunyi yang belum banyak diketahui orang — temukan keindahan yang masih terjaga
        </p>
    </div>
</section>

<!-- ── STATS ── -->
<section class="hg-stats">
    <div class="container hg-stats-wrap">
        <div class="hg-stats-item">
            <span class="hg-stats-count"><?= count($hidden_gem) ?></span>
            <span class="hg-stats-label">Hidden gem ditemukan</span>
        </div>
        <div class="hg-stats-item">
            <span class="hg-stats-count">🌿</span>
            <span class="hg-stats-label">Spot alami & tersembunyi</span>
        </div>
    </div>
</section>

<!-- ── LIST HIDDEN GEM ── -->
<section class="hg-list-section">
    <div class="container">

        <?php if (!empty($hidden_gem)): ?>
        <div class="hg-grid">
            <?php foreach ($hidden_gem as $gem): ?>
            <a href="<?= base_url('tempat/' . $gem['id']) ?>" class="hg-card-link">
                <div class="hg-card">

                    <!-- Thumbnail -->
                    <div class="hg-card-thumb">
                        💎
                        <div class="hg-card-badge">
                            Hidden Gem
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="hg-card-info">
                        <h3 class="hg-card-title"><?= esc($gem['nama_tempat']) ?></h3>
                        <p class="hg-card-address">📍 <?= esc($gem['alamat']) ?></p>
                        <p class="hg-card-desc">
                            <?= esc(substr($gem['deskripsi'] ?? '', 0, 100)) ?>...
                        </p>
                        <div class="hg-card-footer">
                            <span class="hg-card-time">🕐 <?= esc($gem['jam_buka'] ?? '-') ?></span>
                            <span class="star-rating">⭐ <?= number_format($gem['rating_avg'], 1) ?></span>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

        <?php else: ?>
        <div class="hg-empty">
            <div class="hg-empty-icon">💎</div>
            <h3 class="hg-empty-title">Belum ada hidden gem</h3>
            <p class="hg-empty-desc">Hidden gem akan segera hadir!</p>
        </div>
        <?php endif; ?>

    </div>
</section>

</main>

<?= $this->include('layout/footer') ?>