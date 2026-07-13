<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - goVisit</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', sans-serif; }
        body { min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #0F6E56 0%, #1D9E75 60%, #5DCAA5 100%); }

        .card {
            background: white; border-radius: 20px; padding: 40px 35px;
            width: 100%; max-width: 400px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }
        .brand { text-align: center; margin-bottom: 28px; }
        .brand-logo { width: 80px; height: 80px; object-fit: contain; }
        .brand-name { font-size: 22px; font-weight: 700; color: #0F6E56; margin-top: 4px; }
        .brand-sub { font-size: 12px; color: #6B7280; margin-top: 2px; }

        h2 { font-size: 18px; font-weight: 600; color: #111827; margin-bottom: 6px; }
        p.sub { font-size: 13px; color: #6B7280; margin-bottom: 24px; }

        .alert-error {
            background: #FEE2E2; color: #B91C1C;
            padding: 10px 14px; border-radius: 8px; font-size: 13px; margin-bottom: 18px;
        }

        .form-group { margin-bottom: 18px; }
        label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        input {
            width: 100%; padding: 13px 16px; border: 1.5px solid #E5E7EB;
            border-radius: 10px; font-size: 14px; color: #1F2937;
            font-family: 'Inter', sans-serif; transition: border-color 0.2s;
            outline: none;
        }
        input:focus { border-color: #1D9E75; box-shadow: 0 0 0 3px rgba(29,158,117,0.1); }

        .password-wrap { position: relative; }
        .toggle-pass {
            position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
            background: none; border: none; cursor: pointer; color: #9CA3AF; font-size: 16px;
        }

        .btn {
            width: 100%; padding: 14px; background: #1D9E75; color: white;
            border: none; border-radius: 10px; font-size: 15px; font-weight: 600;
            cursor: pointer; margin-top: 8px; transition: background 0.2s;
            font-family: 'Inter', sans-serif;
        }
        .btn:hover { background: #0F6E56; }

        .back { text-align: center; margin-top: 20px; font-size: 13px; color: #6B7280; }
        .back a { color: #1D9E75; font-weight: 600; text-decoration: none; }
        .back a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="card">
        <div class="brand">
            <img src="<?= base_url('logo.png') ?>" alt="goVisit" class="brand-logo">
            <div class="brand-name">goVisit</div>
            <div class="brand-sub">Panel Admin</div>
        </div>

        <h2>Masuk sebagai Admin</h2>
        <p class="sub">Silakan masuk untuk mengelola data wisata</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('admin/login/proses') ?>" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email admin" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrap">
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                    <button type="button" class="toggle-pass" onclick="togglePass()">👁</button>
                </div>
            </div>
            <button type="submit" class="btn">Masuk</button>
        </form>

        <div class="back">
            <a href="<?= base_url('/') ?>">← Kembali ke Beranda</a>
        </div>
    </div>

    <script>
        function togglePass() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>
