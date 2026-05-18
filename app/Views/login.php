<?= view('layout/header', ['title' => $title]) ?>

<div class="d-flex align-items-center justify-content-center py-5 px-3"
     style="min-height: calc(100vh - 80px);
            background: radial-gradient(circle at 15% 25%, rgba(255,204,62,.35), transparent 40%),
                        radial-gradient(circle at 85% 75%, rgba(255,77,46,.25), transparent 40%),
                        #FFF3C4;">
    <div class="w-100" style="max-width:440px;">

        <!-- Logo -->
        <div class="text-center mb-4">
            <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                 style="width:70px; height:70px; background:#0A4D8C;">
                <i class="bi bi-shield-lock-fill" style="font-size:2rem; color:#FFCC3E;"></i>
            </div>
            <h2 class="fw-bold" style="color:#0A4D8C;"><?= esc($heading) ?></h2>
            <p class="text-muted"><?= esc($subtext) ?></p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-4 shadow-sm p-4">

            <!-- Info khusus tim -->
            <div class="rounded-3 p-3 mb-4 text-center"
                 style="background:#FFF3C4; border:1px solid rgba(10,77,140,.15);">
                <i class="bi bi-info-circle-fill me-1" style="color:#0A4D8C;"></i>
                <span class="small fw-semibold" style="color:#0A4D8C;">
                    Halaman ini khusus untuk anggota Tim GoVisit
                </span>
            </div>

            <form action="#" method="post">
                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label fw-semibold small" for="email">
                        <i class="bi bi-envelope-fill me-1" style="color:#0A4D8C;"></i> Email Tim
                    </label>
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="email@govisit.com" required
                           style="border-radius:10px; padding:.7rem 1rem;">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="form-label fw-semibold small mb-1" for="password">
                        <i class="bi bi-lock-fill me-1" style="color:#0A4D8C;"></i> Password
                    </label>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="••••••••" required
                           style="border-radius:10px; padding:.7rem 1rem;">
                </div>

                <!-- Submit -->
                <button type="submit" class="btn w-100 fw-bold py-2"
                        style="background:#0A4D8C; color:#fff; border-radius:10px; font-size:1rem;">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Masuk ke Portal Tim
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="/govisit/beranda" class="small text-muted text-decoration-none">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                </a>
            </div>
        </div>

    </div>
</div>

<?= view('layout/footer') ?>