<footer style="background:#0F1C14; color:#9CA3AF; margin-top:auto;">

    <!-- Main Footer -->
    <div style="max-width:1100px; margin:0 auto; padding:3rem 1.5rem 2rem; display:grid; grid-template-columns:2fr 1fr 1fr; gap:3rem; flex-wrap:wrap;">

        <!-- Brand -->
        <div>
            <div style="display:flex; align-items:center; gap:10px; margin-bottom:1rem;">
                <img src="<?= base_url('logo.png') ?>" alt="goVisit" style="width:44px; height:44px; object-fit:contain;">
                <span style="font-size:22px; font-weight:800; color:white; letter-spacing:-0.5px;">go<span style="color:#1D9E75;">Visit</span></span>
            </div>
            <p style="font-size:14px; line-height:1.7; color:#6B7280; max-width:280px;">
                Platform terpercaya untuk menemukan destinasi wisata, cafe, dan hidden gem terbaik di Kota Palu & sekitarnya.
            </p>
            <div style="display:flex; gap:10px; margin-top:1.25rem;">
                <a href="#" style="width:36px; height:36px; background:#1A2A1F; border-radius:8px; display:flex; align-items:center; justify-content:center; text-decoration:none; font-size:16px; transition:background 0.2s;" onmouseover="this.style.background='#1D9E75'" onmouseout="this.style.background='#1A2A1F'">📸</a>
                <a href="#" style="width:36px; height:36px; background:#1A2A1F; border-radius:8px; display:flex; align-items:center; justify-content:center; text-decoration:none; font-size:16px; transition:background 0.2s;" onmouseover="this.style.background='#1D9E75'" onmouseout="this.style.background='#1A2A1F'">🎵</a>
                <a href="#" style="width:36px; height:36px; background:#1A2A1F; border-radius:8px; display:flex; align-items:center; justify-content:center; text-decoration:none; font-size:16px; transition:background 0.2s;" onmouseover="this.style.background='#1D9E75'" onmouseout="this.style.background='#1A2A1F'">🐦</a>
            </div>
        </div>

        <!-- Jelajahi -->
        <div>
            <div style="font-size:13px; font-weight:700; color:white; text-transform:uppercase; letter-spacing:1px; margin-bottom:1.1rem;">Jelajahi</div>
            <div style="display:flex; flex-direction:column; gap:10px;">
                <a href="<?= base_url('/') ?>" style="font-size:14px; color:#6B7280; text-decoration:none; transition:color 0.2s;" onmouseover="this.style.color='#1D9E75'" onmouseout="this.style.color='#6B7280'">🏠 Beranda</a>
                <a href="<?= base_url('eksplorasi') ?>" style="font-size:14px; color:#6B7280; text-decoration:none; transition:color 0.2s;" onmouseover="this.style.color='#1D9E75'" onmouseout="this.style.color='#6B7280'">🗺️ Eksplorasi</a>
                <a href="<?= base_url('eksplorasi?kategori=wisata') ?>" style="font-size:14px; color:#6B7280; text-decoration:none; transition:color 0.2s;" onmouseover="this.style.color='#1D9E75'" onmouseout="this.style.color='#6B7280'">🏔️ Wisata Alam</a>
                <a href="<?= base_url('eksplorasi?kategori=cafe') ?>" style="font-size:14px; color:#6B7280; text-decoration:none; transition:color 0.2s;" onmouseover="this.style.color='#1D9E75'" onmouseout="this.style.color='#6B7280'">☕ Cafe & Kuliner</a>
                <a href="<?= base_url('hidden-gem') ?>" style="font-size:14px; color:#6B7280; text-decoration:none; transition:color 0.2s;" onmouseover="this.style.color='#1D9E75'" onmouseout="this.style.color='#6B7280'">💎 Hidden Gem</a>
            </div>
        </div>

        <!-- Info -->
        <div>
            <div style="font-size:13px; font-weight:700; color:white; text-transform:uppercase; letter-spacing:1px; margin-bottom:1.1rem;">Info</div>
            <div style="display:flex; flex-direction:column; gap:12px;">
                <div style="display:flex; align-items:flex-start; gap:10px;">
                    <span style="font-size:16px; margin-top:1px;">📍</span>
                    <span style="font-size:13px; color:#6B7280; line-height:1.5;">Kota Palu,<br>Sulawesi Tengah</span>
                </div>
                <div style="display:flex; align-items:center; gap:10px;">
                    <span style="font-size:16px;">📧</span>
                    <span style="font-size:13px; color:#6B7280;">govisit@palu.id</span>
                </div>
                <div style="display:flex; align-items:center; gap:10px;">
                    <span style="font-size:16px;">🕐</span>
                    <span style="font-size:13px; color:#6B7280;">Buka 24 jam</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div style="border-top:1px solid #1A2A1F; padding:1.25rem 1.5rem;">
        <div style="max-width:1100px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:8px;">
            <span style="font-size:13px;">&copy; <?= date('Y') ?> <span style="color:#1D9E75; font-weight:700;">goVisit</span> — Jelajahi Wisata, Cafe & Hidden Gem Kota Palu</span>
            <span style="font-size:12px; color:#374151;">Dibuat dengan ❤️ untuk Kota Palu</span>
        </div>
    </div>
</footer>

<?= $this->include('layout/autocomplete') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
