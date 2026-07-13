<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>goVisit — Jelajahi Kota Palu</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --hijau:     #1D9E75;
            --hijau-tua: #0F6E56;
            --hijau-muda:#E1F5EE;
            --ungu:      #7F77DD;
            --ungu-muda: #EEEDFE;
            --amber:     #BA7517;
            --amber-muda:#FAEEDA;
            --abu:       #6B7280;
            --abu-muda:  #F3F4F6;
            --putih:     #FFFFFF;
            --gelap:     #1A1A2E;
            --radius:    12px;
            --shadow:    0 2px 16px rgba(0,0,0,0.08);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #F8FAF9;
            color: var(--gelap);
            min-height: 100vh;
        }

        /* ── NAVBAR ── */
        .navbar {
            background: var(--putih);
            border-bottom: 1px solid #E5E7EB;
            padding: 0 2rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .navbar-brand .logo-icon {
            width: 42px;
            height: 42px;
            object-fit: contain;
        }

        .navbar-brand .logo-text {
            font-size: 20px;
            font-weight: 700;
            color: var(--hijau-tua);
            letter-spacing: -0.5px;
        }

        .navbar-brand .logo-text span {
            color: var(--hijau);
        }

        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
        }

        .navbar-menu a {
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            color: var(--abu);
            transition: color 0.2s;
        }

        .navbar-menu a:hover,
        .navbar-menu a.active {
            color: var(--hijau);
        }

        .navbar-menu .btn-nav {
            background: var(--hijau);
            color: white !important;
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 13px;
            transition: background 0.2s !important;
        }

        .navbar-menu .btn-nav:hover {
            background: var(--hijau-tua) !important;
        }

        /* ── UTILITIES ── */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-wisata  { background: #EAF3DE; color: #3B6D11; }
        .badge-cafe    { background: var(--amber-muda); color: #633806; }
        .badge-gem     { background: var(--ungu-muda); color: #3C3489; }

        .star-rating {
            color: var(--amber);
            font-size: 13px;
            font-weight: 600;
        }

        main { min-height: calc(100vh - 64px - 80px); }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="<?= base_url('/') ?>" class="navbar-brand">
        <img src="<?= base_url('logo.png') ?>" alt="goVisit" class="logo-icon">
        <span class="logo-text">go<span>Visit</span></span>
    </a>
    <ul class="navbar-menu">
        <li><a href="<?= base_url('/') ?>" class="<?= (current_url() == base_url('/')) ? 'active' : '' ?>">Beranda</a></li>
        <li><a href="<?= base_url('eksplorasi') ?>" class="<?= str_contains(current_url(), 'eksplorasi') ? 'active' : '' ?>">Eksplorasi</a></li>
        <li><a href="<?= base_url('hidden-gem') ?>" class="<?= str_contains(current_url(), 'hidden-gem') ? 'active' : '' ?>">Hidden Gem</a></li>
        <li><a href="<?= base_url('admin') ?>" class="btn-nav">Admin</a></li>
    </ul>
</nav>