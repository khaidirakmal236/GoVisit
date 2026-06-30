<?php

if (!function_exists('cek_status_buka')) {
    function cek_status_buka(?string $jam_buka): array
    {
        if (empty($jam_buka)) {
            return ['status' => 'unknown', 'warna' => '#9CA3AF', 'dot' => '⚪', 'label' => 'Info tidak tersedia'];
        }

        $str = strtolower(trim($jam_buka));

        if (str_contains($str, '24 jam')) {
            return ['status' => 'buka', 'warna' => '#10B981', 'dot' => '🟢', 'label' => 'Buka 24 Jam'];
        }

        $now     = (int)date('H') * 60 + (int)date('i');
        $days_id = ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
        $today   = $days_id[(int)date('w')];

        // Hapus baris yang berisi nomor telepon
        $lines = preg_split('/[\n\r]+/', $str);
        $lines = array_filter($lines, fn($l) => !preg_match('/nomor|no[:\s]|08\d{8,}/', $l));

        // Cari baris yang spesifik untuk hari ini
        $range = null;
        foreach ($lines as $line) {
            if (str_contains($line, $today) || str_contains($line, 'setiap')) {
                $r = _parse_jam($line);
                if ($r) { $range = $r; break; }
            }
        }

        // Fallback: ambil range pertama yang ditemukan
        if (!$range) {
            foreach ($lines as $line) {
                $r = _parse_jam($line);
                if ($r) { $range = $r; break; }
            }
        }

        if (!$range) {
            return ['status' => 'unknown', 'warna' => '#9CA3AF', 'dot' => '⚪', 'label' => 'Cek jam buka'];
        }

        [$open, $close] = $range;
        if ($close === 0) $close = 1440; // 00.00 = tengah malam

        $buka = ($now >= $open && $now < $close);

        return [
            'status' => $buka ? 'buka' : 'tutup',
            'warna'  => $buka ? '#10B981' : '#EF4444',
            'dot'    => $buka ? '🟢' : '🔴',
            'label'  => $buka ? 'Buka Sekarang' : 'Tutup',
        ];
    }
}

if (!function_exists('_parse_jam')) {
    function _parse_jam(string $str): ?array
    {
        // Cocokkan pola HH.MM-HH.MM atau HH:MM-HH.MM
        if (preg_match('/(\d{1,2})[.:](\d{2})\s*[-–]\s*(\d{1,2})[.:](\d{2})/', $str, $m)) {
            return [(int)$m[1] * 60 + (int)$m[2], (int)$m[3] * 60 + (int)$m[4]];
        }
        return null;
    }
}
