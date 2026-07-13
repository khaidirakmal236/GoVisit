<?= $this->include('layout/header') ?>

<main>

<!-- ── PAGE HEADER ── -->
<section style="background:linear-gradient(135deg, #1A1A2E, #2D2D44); padding:2rem 1.5rem;">
    <div class="container">
        <a href="<?= base_url('admin') ?>" style="color:#9CA3AF; font-size:13px; text-decoration:none; display:inline-block; margin-bottom:8px;">← Kembali ke Admin</a>
        <h1 style="font-size:1.5rem; font-weight:700; color:white;">
            <?= isset($tempat) ? '✏️ Edit Tempat' : '➕ Tambah Tempat Baru' ?>
        </h1>
    </div>
</section>

<!-- ── FORM ── -->
<section style="padding:2rem 1.5rem;">
    <div class="container" style="max-width:680px;">
        <div style="background:white; border-radius:14px; padding:2rem; box-shadow:0 2px 12px rgba(0,0,0,0.07);">

            <form action="<?= isset($tempat) ? base_url('admin/update/' . $tempat['id']) : base_url('admin/simpan') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <!-- Nama Tempat -->
                <div style="margin-bottom:1.25rem;">
                    <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">Nama Tempat <span style="color:red;">*</span></label>
                    <input type="text" name="nama_tempat" value="<?= esc($tempat['nama_tempat'] ?? '') ?>" required
                        placeholder="Contoh: Pantai Taman Ria"
                        style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none;"
                        onfocus="this.style.borderColor='#1D9E75'" onblur="this.style.borderColor='#E5E7EB'">
                </div>

                <!-- Kategori -->
                <div style="margin-bottom:1.25rem;">
                    <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">Kategori <span style="color:red;">*</span></label>
                    <select name="kategori" required style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none; background:white;">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="wisata"     <?= ($tempat['kategori'] ?? '') === 'wisata'     ? 'selected' : '' ?>>🏔️ Wisata</option>
                        <option value="cafe"       <?= ($tempat['kategori'] ?? '') === 'cafe'       ? 'selected' : '' ?>>☕ Cafe</option>
                        <option value="hidden_gem" <?= ($tempat['kategori'] ?? '') === 'hidden_gem' ? 'selected' : '' ?>>💎 Hidden Gem</option>
                    </select>
                </div>

                <!-- Alamat -->
                <div style="margin-bottom:1.25rem;">
                    <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">Alamat</label>
                    <input type="text" name="alamat" value="<?= esc($tempat['alamat'] ?? '') ?>"
                        placeholder="Contoh: Jl. Taman Ria, Palu Barat"
                        style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none;"
                        onfocus="this.style.borderColor='#1D9E75'" onblur="this.style.borderColor='#E5E7EB'">
                </div>

                <!-- Deskripsi -->
                <div style="margin-bottom:1.25rem;">
                    <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" placeholder="Ceritakan tentang tempat ini..."
                        style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none; resize:vertical;"
                        onfocus="this.style.borderColor='#1D9E75'" onblur="this.style.borderColor='#E5E7EB'"><?= esc($tempat['deskripsi'] ?? '') ?></textarea>
                </div>

                <!-- Jam Buka & Rating -->
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1.25rem;">
                    <div>
                        <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">Jam Buka</label>
                        <input type="text" name="jam_buka" value="<?= esc($tempat['jam_buka'] ?? '') ?>"
                            placeholder="07.00 - 18.00"
                            style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none;"
                            onfocus="this.style.borderColor='#1D9E75'" onblur="this.style.borderColor='#E5E7EB'">
                    </div>
                    <div>
                        <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">Rating Awal</label>
                        <input type="number" name="rating_avg" value="<?= esc($tempat['rating_avg'] ?? '0') ?>" min="0" max="5" step="0.1"
                            style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none;"
                            onfocus="this.style.borderColor='#1D9E75'" onblur="this.style.borderColor='#E5E7EB'">
                    </div>
                </div>

                <!-- Maps Link -->
                <div style="margin-bottom:1.25rem;">
                    <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">Link Google Maps</label>
                    <input type="text" name="maps_link" value="<?= esc($tempat['maps_link'] ?? '') ?>"
                        placeholder="https://maps.google.com/..."
                        style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none;"
                        onfocus="this.style.borderColor='#1D9E75'" onblur="this.style.borderColor='#E5E7EB'">
                </div>

                <!-- Foto Tempat -->
                <div style="margin-bottom:1.25rem;">
                    <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">
                        Foto Tempat
                    </label>
                    <input type="file" name="foto" accept="image/*"
                        style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; background:white;">

                    <?php if (!empty($tempat['foto'])): ?>
                        <div style="margin-top:12px;">
                            <p style="font-size:13px; color:#6B7280; margin-bottom:8px;">Foto saat ini:</p>
                            <img src="<?= base_url('uploads/tempat/' . $tempat['foto']) ?>"
                                 alt="Foto Tempat"
                                 style="width:180px; height:120px; object-fit:cover; border-radius:10px; border:1px solid #E5E7EB;">
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Status -->
                <div style="margin-bottom:1.75rem;">
                    <label style="font-size:13px; font-weight:600; color:#374151; display:block; margin-bottom:6px;">Status</label>
                    <select name="status" style="width:100%; padding:10px 14px; border:1.5px solid #E5E7EB; border-radius:8px; font-size:14px; font-family:inherit; outline:none; background:white;">
                        <option value="aktif"    <?= ($tempat['status'] ?? 'aktif') === 'aktif'    ? 'selected' : '' ?>>✅ Aktif</option>
                        <option value="nonaktif" <?= ($tempat['status'] ?? '')      === 'nonaktif' ? 'selected' : '' ?>>❌ Nonaktif</option>
                    </select>
                </div>

                <!-- Tombol -->
                <div style="display:flex; gap:10px;">
                    <button type="submit" style="background:#1D9E75; color:white; border:none; padding:12px 28px; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; font-family:inherit;">
                        <?= isset($tempat) ? '💾 Simpan Perubahan' : '➕ Tambah Tempat' ?>
                    </button>
                    <a href="<?= base_url('admin') ?>" style="background:#F3F4F6; color:#374151; padding:12px 20px; border-radius:8px; font-size:14px; font-weight:600; text-decoration:none;">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>
</section>

</main>

<?= $this->include('layout/footer') ?>