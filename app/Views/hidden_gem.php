<?= $this->include('layout/header') ?>

<main>

<!-- ── HERO ── -->
<section style="background:linear-gradient(135deg, #3C3489 0%, #7F77DD 60%, #A9A4EE 100%); padding:3rem 1.5rem; text-align:center; position:relative; overflow:hidden;">
    <div style="position:absolute;inset:0;background:url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2210%22 cy=%2210%22 r=%2230%22 fill=%22rgba(255,255,255,0.04)%22/><circle cx=%2290%22 cy=%2290%22 r=%2250%22 fill=%22rgba(255,255,255,0.04)%22/></svg>');"></div>
    <div class="container" style="position:relative;">
        <div style="font-size:3rem; margin-bottom:1rem;">💎</div>
        <h1 style="font-size:clamp(1.8rem,4vw,2.8rem); font-weight:700; color:white; margin-bottom:8px;">Hidden Gem Palu</h1>
        <p style="color:rgba(255,255,255,0.85); font-size:14px; max-width:480px; margin:0 auto;">
            Spot-spot tersembunyi yang belum banyak diketahui orang — temukan keindahan yang masih terjaga
        </p>
    </div>
</section>

<!-- ── STATS ── -->
<section style="background:white; border-bottom:1px solid #E5E7EB; padding:1rem 1.5rem;">
    <div class="container" style="display:flex; gap:2rem; flex-wrap:wrap;">
        <div style="display:flex; align-items:center; gap:8px;">
            <span style="font-size:1.5rem; font-weight:700; color:#3C3489;"><?= count($hidden_gem) ?></span>
            <span style="font-size:13px; color:#6B7280;">Hidden gem ditemukan</span>
        </div>
        <div style="display:flex; align-items:center; gap:8px;">
            <span style="font-size:1.5rem; font-weight:700; color:#3C3489;">🌿</span>
            <span style="font-size:13px; color:#6B7280;">Spot alami & tersembunyi</span>
        </div>
    </div>
</section>

<!-- ── LIST HIDDEN GEM ── -->
<section style="padding:2rem 1.5rem;">
    <div class="container">

        <?php if (!empty($hidden_gem)): ?>
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px,1fr)); gap:1.5rem;">
            <?php foreach ($hidden_gem as $gem): ?>
            <a href="<?= base_url('tempat/' . $gem['id']) ?>" style="text-decoration:none; color:inherit;">
                <div style="background:white; border-radius:16px; overflow:hidden; box-shadow:0 2px 16px rgba(127,119,221,0.12); border:1px solid #EEEDFE; transition:transform 0.2s, box-shadow 0.2s;"
                    onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 12px 32px rgba(127,119,221,0.2)'"
                    onmouseout="this.style.transform='';this.style.boxShadow='0 2px 16px rgba(127,119,221,0.12)'">

                    <!-- Thumbnail -->
                    <div style="height:160px; background:linear-gradient(135deg, #CECBF6, #EEEDFE); display:flex; align-items:center; justify-content:center; font-size:4rem; position:relative;">
                        💎
                        <div style="position:absolute; top:12px; right:12px; background:rgba(60,52,137,0.8); color:white; font-size:11px; font-weight:600; padding:4px 10px; border-radius:20px;">
                            Hidden Gem
                        </div>
                    </div>

                    <!-- Info -->
                    <div style="padding:1.25rem;">
                        <h3 style="font-size:16px; font-weight:700; color:#3C3489; margin-bottom:6px;"><?= esc($gem['nama_tempat']) ?></h3>
                        <p style="font-size:12px; color:#7F77DD; margin-bottom:10px;">📍 <?= esc($gem['alamat']) ?></p>
                        <p style="font-size:13px; color:#4B5563; line-height:1.6; margin-bottom:12px;">
                            <?= esc(substr($gem['deskripsi'] ?? '', 0, 100)) ?>...
                        </p>
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <span style="font-size:12px; color:#6B7280;">🕐 <?= esc($gem['jam_buka'] ?? '-') ?></span>
                            <span class="star-rating">⭐ <?= number_format($gem['rating_avg'], 1) ?></span>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

        <?php else: ?>
        <div style="text-align:center; padding:4rem 1rem;">
            <div style="font-size:3rem; margin-bottom:1rem;">💎</div>
            <h3 style="font-size:1.2rem; color:#3C3489; margin-bottom:8px;">Belum ada hidden gem</h3>
            <p style="color:#7F77DD; font-size:14px;">Hidden gem akan segera hadir!</p>
        </div>
        <?php endif; ?>

    </div>
</section>

</main>

<?= $this->include('layout/footer') ?>