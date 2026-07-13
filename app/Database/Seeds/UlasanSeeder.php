<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UlasanSeeder extends Seeder
{
    public function run()
    {
        // Ambil ID tempat berdasarkan nama agar tidak hardcode angka
        $ids = [];
        $rows = $this->db->table('tempat')->select('id, nama_tempat')->get()->getResultArray();
        foreach ($rows as $row) {
            $ids[$row['nama_tempat']] = $row['id'];
        }

        $now = date('Y-m-d H:i:s');

        $ulasan = [
            // Pantai Taman Ria
            ['id_tempat' => $ids['Pantai Taman Ria'] ?? 1,         'nama_pengunjung' => 'Andi Saputra',   'rating' => 5, 'komentar' => 'Tempatnya bagus banget, cocok buat foto-foto sore hari!',             'created_at' => $now],
            ['id_tempat' => $ids['Pantai Taman Ria'] ?? 1,         'nama_pengunjung' => 'Siti Rahma',     'rating' => 4, 'komentar' => 'Pemandangannya indah, tapi parkir agak susah waktu ramai.',          'created_at' => $now],
            // Jembatan Palu IV
            ['id_tempat' => $ids['Jembatan Palu IV'] ?? 2,         'nama_pengunjung' => 'Farid Mustofa',  'rating' => 5, 'komentar' => 'Keren banget malamnya, lampu-lampunya cantik sekali!',                'created_at' => $now],
            ['id_tempat' => $ids['Jembatan Palu IV'] ?? 2,         'nama_pengunjung' => 'Lila Anggraeni', 'rating' => 5, 'komentar' => 'Jadi kebanggaan Kota Palu, wajib foto di sini!',                     'created_at' => $now],
            // Monumen Nosarara Nosabatutu
            ['id_tempat' => $ids['Monumen Nosarara Nosabatutu'] ?? 3, 'nama_pengunjung' => 'Hasna Putri', 'rating' => 5, 'komentar' => 'View dari atas luar biasa! Bisa lihat seluruh kota Palu.',           'created_at' => $now],
            // Danau Poso
            ['id_tempat' => $ids['Danau Poso'] ?? 4,               'nama_pengunjung' => 'Budi Santoso',   'rating' => 5, 'komentar' => 'Airnya bening banget, wajib dikunjungi kalau ke Sulawesi!',          'created_at' => $now],
            ['id_tempat' => $ids['Danau Poso'] ?? 4,               'nama_pengunjung' => 'Yuni Kartika',   'rating' => 5, 'komentar' => 'Salah satu danau terindah yang pernah saya kunjungi.',               'created_at' => $now],
            // Kopi Palu Kita
            ['id_tempat' => $ids['Kopi Palu Kita'] ?? 6,           'nama_pengunjung' => 'Rahma Dewi',     'rating' => 5, 'komentar' => 'Kopinya enak banget, tempatnya nyaman buat kerja juga.',             'created_at' => $now],
            ['id_tempat' => $ids['Kopi Palu Kita'] ?? 6,           'nama_pengunjung' => 'Irfan Maulana',  'rating' => 5, 'komentar' => 'Recommended buat nongkrong, WiFi kencang dan suasana oke.',          'created_at' => $now],
            // Warung Kopi Tobelo
            ['id_tempat' => $ids['Warung Kopi Tobelo'] ?? 7,       'nama_pengunjung' => 'Denny Pratama',  'rating' => 4, 'komentar' => 'Murah meriah, cocok buat mahasiswa!',                               'created_at' => $now],
            ['id_tempat' => $ids['Warung Kopi Tobelo'] ?? 7,       'nama_pengunjung' => 'Wina Sari',      'rating' => 4, 'komentar' => 'Kopi susu Tobelonya juara, selalu jadi langganan.',                  'created_at' => $now],
            // Rumah Kapurung
            ['id_tempat' => $ids['Rumah Kapurung Palu'] ?? 8,      'nama_pengunjung' => 'Ayu Lestari',    'rating' => 5, 'komentar' => 'Kapurungnya otentik banget, rasa bumbu yang khas Palu.',             'created_at' => $now],
            // Air Terjun Kalukubula
            ['id_tempat' => $ids['Air Terjun Kalukubula'] ?? 10,   'nama_pengunjung' => 'Nur Hidayah',    'rating' => 5, 'komentar' => 'Sejuk banget! Perjalanannya sedikit tricky tapi worth it.',          'created_at' => $now],
            ['id_tempat' => $ids['Air Terjun Kalukubula'] ?? 10,   'nama_pengunjung' => 'Rizky Anwar',    'rating' => 4, 'komentar' => 'Airnya jernih sekali, sangat menyegarkan.',                         'created_at' => $now],
            // Puncak Selena
            ['id_tempat' => $ids['Puncak Selena'] ?? 11,           'nama_pengunjung' => 'Fauzan Akbar',   'rating' => 5, 'komentar' => 'Sunrise dari sini luar biasa, pasti balik lagi!',                   'created_at' => $now],
            // Pantai Mbela-Mbela
            ['id_tempat' => $ids['Pantai Mbela-Mbela'] ?? 12,      'nama_pengunjung' => 'Tari Susanti',   'rating' => 5, 'komentar' => 'Pantainya masih sangat bersih, hidden gem yang sesungguhnya!',       'created_at' => $now],
        ];

        $this->db->table('ulasan')->insertBatch($ulasan);

        // Update rating_avg di tabel tempat berdasarkan ulasan yang di-seed
        $groups = [];
        foreach ($ulasan as $u) {
            $groups[$u['id_tempat']][] = $u['rating'];
        }
        foreach ($groups as $idTempat => $ratings) {
            $avg = array_sum($ratings) / count($ratings);
            $this->db->table('tempat')->where('id', $idTempat)->update(['rating_avg' => round($avg, 1)]);
        }
    }
}
