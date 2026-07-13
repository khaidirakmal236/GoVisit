<?= $this->include('layout/header') ?>

<main>

<!-- ── PAGE HEADER ── -->
<section style="background:linear-gradient(135deg, #1A1A2E, #2D2D44); padding:2rem 1.5rem;">
    <div class="container" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem;">
        <div>
            <h1 style="font-size:1.5rem; font-weight:700; color:white; margin-bottom:4px;">⚙️ Admin Panel</h1>
            <p style="color:#9CA3AF; font-size:14px;">Kelola data tempat wisata goVisit</p>
        </div>
        <div style="display:flex; gap:10px; align-items:center;">
            <span style="color:#9CA3AF; font-size:13px;">👤 <?= esc(session()->get('nama')) ?></span>
            <a href="<?= base_url('admin/tambah') ?>"
               style="background:#1D9E75; color:white; padding:10px 20px; border-radius:8px; font-size:14px; font-weight:600; text-decoration:none;">
                + Tambah Tempat
            </a>
            <a href="<?= base_url('admin/logout') ?>"
               style="background:#EF4444; color:white; padding:10px 16px; border-radius:8px; font-size:14px; font-weight:600; text-decoration:none;">
                Keluar
            </a>
        </div>
    </div>
</section>

<!-- ── STATS ── -->
<section style="background:white; border-bottom:1px solid #E5E7EB; padding:1.25rem 1.5rem;">
    <div class="container" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(150px,1fr)); gap:1rem;">
        <div style="background:#F8FAF9; border-radius:10px; padding:1rem;">
            <div style="font-size:11px; color:#6B7280; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:4px;">Total Tempat</div>
            <div style="font-size:1.8rem; font-weight:700; color:#1A1A2E;"><?= count($tempat) ?></div>
        </div>
        <div style="background:#E1F5EE; border-radius:10px; padding:1rem;">
            <div style="font-size:11px; color:#0F6E56; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:4px;">Wisata</div>
            <div style="font-size:1.8rem; font-weight:700; color:#0F6E56;"><?= count(array_filter($tempat, fn($t) => $t['kategori'] === 'wisata')) ?></div>
        </div>
        <div style="background:#FAEEDA; border-radius:10px; padding:1rem;">
            <div style="font-size:11px; color:#633806; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:4px;">Cafe</div>
            <div style="font-size:1.8rem; font-weight:700; color:#633806;"><?= count(array_filter($tempat, fn($t) => $t['kategori'] === 'cafe')) ?></div>
        </div>
        <div style="background:#EEEDFE; border-radius:10px; padding:1rem;">
            <div style="font-size:11px; color:#3C3489; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:4px;">Hidden Gem</div>
            <div style="font-size:1.8rem; font-weight:700; color:#3C3489;"><?= count(array_filter($tempat, fn($t) => $t['kategori'] === 'hidden_gem')) ?></div>
        </div>
    </div>
</section>

<!-- ── TABEL DATA ── -->
<section style="padding:2rem 1.5rem;">
    <div class="container">

        <?php if (session()->getFlashdata('success')): ?>
        <div style="background:#E1F5EE; color:#0F6E56; padding:12px 16px; border-radius:8px; margin-bottom:1rem; font-size:14px; font-weight:500;">
            ✅ <?= session()->getFlashdata('success') ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($tempat)): ?>
        <div style="background:white; border-radius:14px; overflow:hidden; box-shadow:0 2px 12px rgba(0,0,0,0.07);">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:#F8FAF9; border-bottom:1px solid #E5E7EB;">
                        <th style="padding:12px 16px; text-align:left; font-size:12px; font-weight:600; color:#6B7280; text-transform:uppercase; letter-spacing:0.5px;">No</th>
                        <th style="padding:12px 16px; text-align:left; font-size:12px; font-weight:600; color:#6B7280; text-transform:uppercase; letter-spacing:0.5px;">Nama Tempat</th>
                        <th style="padding:12px 16px; text-align:left; font-size:12px; font-weight:600; color:#6B7280; text-transform:uppercase; letter-spacing:0.5px;">Kategori</th>
                        <th style="padding:12px 16px; text-align:left; font-size:12px; font-weight:600; color:#6B7280; text-transform:uppercase; letter-spacing:0.5px;">Rating</th>
                        <th style="padding:12px 16px; text-align:left; font-size:12px; font-weight:600; color:#6B7280; text-transform:uppercase; letter-spacing:0.5px;">Status</th>
                        <th style="padding:12px 16px; text-align:center; font-size:12px; font-weight:600; color:#6B7280; text-transform:uppercase; letter-spacing:0.5px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tempat as $i => $t): ?>
                    <tr style="border-bottom:1px solid #F3F4F6; transition:background 0.15s;" onmouseover="this.style.background='#F8FAF9'" onmouseout="this.style.background=''">
                        <td style="padding:14px 16px; font-size:14px; color:#6B7280;"><?= $i + 1 ?></td>
                        <td style="padding:14px 16px;">
                            <div style="font-size:14px; font-weight:600; color:#1A1A2E;"><?= esc($t['nama_tempat']) ?></div>
                            <div style="font-size:12px; color:#9CA3AF; margin-top:2px;">📍 <?= esc($t['alamat']) ?></div>
                        </td>
                        <td style="padding:14px 16px;">
                            <span class="badge badge-<?= $t['kategori'] === 'hidden_gem' ? 'gem' : $t['kategori'] ?>">
                                <?= $t['kategori'] === 'hidden_gem' ? 'Hidden Gem' : ucfirst($t['kategori']) ?>
                            </span>
                        </td>
                        <td style="padding:14px 16px;" class="star-rating">⭐ <?= number_format($t['rating_avg'], 1) ?></td>
                        <td style="padding:14px 16px;">
                            <span style="background:<?= $t['status'] === 'aktif' ? '#E1F5EE' : '#FEE2E2' ?>; color:<?= $t['status'] === 'aktif' ? '#0F6E56' : '#991B1B' ?>; padding:3px 10px; border-radius:20px; font-size:12px; font-weight:600;">
                                <?= ucfirst($t['status']) ?>
                            </span>
                        </td>
                        <td style="padding:14px 16px; text-align:center;">
                            <div style="display:flex; gap:8px; justify-content:center;">
                                <a href="<?= base_url('admin/edit/' . $t['id']) ?>"
                                   style="background:#E1F5EE; color:#0F6E56; padding:6px 14px; border-radius:6px; font-size:12px; font-weight:600; text-decoration:none;">
                                    ✏️ Edit
                                </a>
                                <a href="<?= base_url('admin/hapus/' . $t['id']) ?>"
                                   onclick="return confirm('Yakin hapus tempat ini?')"
                                   style="background:#FEE2E2; color:#991B1B; padding:6px 14px; border-radius:6px; font-size:12px; font-weight:600; text-decoration:none;">
                                    🗑️ Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>
        <div style="text-align:center; padding:4rem 1rem; background:white; border-radius:14px; box-shadow:0 2px 12px rgba(0,0,0,0.07);">
            <div style="font-size:3rem; margin-bottom:1rem;">📭</div>
            <h3 style="font-size:1.1rem; color:#1A1A2E; margin-bottom:8px;">Belum ada data tempat</h3>
            <p style="color:#6B7280; font-size:14px; margin-bottom:1rem;">Mulai tambahkan tempat wisata pertama!</p>
            <a href="<?= base_url('admin/tambah') ?>"
               style="background:#1D9E75; color:white; padding:10px 20px; border-radius:8px; font-size:14px; font-weight:600; text-decoration:none;">
                + Tambah Tempat
            </a>
        </div>
        <?php endif; ?>

    </div>
</section>

</main>

<?= $this->include('layout/footer') ?>