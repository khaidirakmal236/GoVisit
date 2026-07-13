<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UlasanSeeder extends Seeder
{
    public function run()
    {
        // Ambil ID berdasarkan nama agar tidak hardcode angka
        $ids = [];
        $rows = $this->db->table('tempat')->select('id, nama_tempat')->get()->getResultArray();
        foreach ($rows as $row) {
            $ids[$row['nama_tempat']] = $row['id'];
        }

        $now = date('Y-m-d H:i:s');

        $ulasan = [
            ['id_tempat' => $ids['Pantai Taman Ria']       ?? 0, 'nama_pengunjung' => 'Andi Saputra',   'rating' => 5, 'komentar' => 'Tempatnya bagus banget, cocok buat foto-foto sore hari!',                'created_at' => $now],
            ['id_tempat' => $ids['Pantai Taman Ria']       ?? 0, 'nama_pengunjung' => 'Siti Rahma',     'rating' => 4, 'komentar' => 'Pemandangannya indah, tapi parkir agak susah waktu ramai.',             'created_at' => $now],
            ['id_tempat' => $ids['Bukit Salena']            ?? 0, 'nama_pengunjung' => 'Fauzan Akbar',   'rating' => 5, 'komentar' => 'Sunrise dari sini luar biasa, pasti balik lagi!',                       'created_at' => $now],
            ['id_tempat' => $ids['Bukit Salena']            ?? 0, 'nama_pengunjung' => 'Hasna Putri',    'rating' => 4, 'komentar' => 'View kota Palu dari atas bukit sangat cantik di malam hari.',           'created_at' => $now],
            ['id_tempat' => $ids['Pantai Talise']           ?? 0, 'nama_pengunjung' => 'Yuni Kartika',   'rating' => 5, 'komentar' => 'Pantai favorit keluarga, banyak pilihan kuliner di pinggir pantai!',    'created_at' => $now],
            ['id_tempat' => $ids['Taipa Beach']             ?? 0, 'nama_pengunjung' => 'Tari Susanti',   'rating' => 4, 'komentar' => 'Lebih tenang dari Talise, cocok buat yang mau santai.',                 'created_at' => $now],
            ['id_tempat' => $ids['Gong Perdamaian Palu']   ?? 0, 'nama_pengunjung' => 'Rizky Anwar',    'rating' => 5, 'komentar' => 'Spot foto keren, ikonnya Kota Palu banget!',                            'created_at' => $now],
            ['id_tempat' => $ids['Puncak Selena']           ?? 0, 'nama_pengunjung' => 'Lila Anggraeni', 'rating' => 5, 'komentar' => 'City light malam hari dari puncaknya bikin takjub!',                   'created_at' => $now],
            ['id_tempat' => $ids['Kopi Palu Kita']          ?? 0, 'nama_pengunjung' => 'Rahma Dewi',     'rating' => 5, 'komentar' => 'Kopinya enak banget, tempatnya nyaman buat kerja juga.',               'created_at' => $now],
            ['id_tempat' => $ids['Kopi Palu Kita']          ?? 0, 'nama_pengunjung' => 'Irfan Maulana',  'rating' => 5, 'komentar' => 'Recommended buat nongkrong, WiFi kencang dan suasana oke.',            'created_at' => $now],
            ['id_tempat' => $ids['Kafi Coffee Palu']        ?? 0, 'nama_pengunjung' => 'Denny Pratama',  'rating' => 5, 'komentar' => 'Tempatnya aesthetic banget, cocok buat nugas sambil ngopi!',            'created_at' => $now],
            ['id_tempat' => $ids['Tanaris Coffee']          ?? 0, 'nama_pengunjung' => 'Wina Sari',      'rating' => 4, 'komentar' => 'Tempat kerja kelompok yang oke, menu lengkap dan harga wajar.',         'created_at' => $now],
            ['id_tempat' => $ids['See You Latte Coffee']    ?? 0, 'nama_pengunjung' => 'Ayu Lestari',    'rating' => 4, 'komentar' => 'Cafe date yang pas, suasana romantis dan menu minumannya enak!',        'created_at' => $now],
            ['id_tempat' => $ids['Intime Coffee']           ?? 0, 'nama_pengunjung' => 'Farid Mustofa',  'rating' => 5, 'komentar' => 'Suasananya tenang dan aesthetic, favoritku di Palu!',                  'created_at' => $now],
            ['id_tempat' => $ids['Rumah Kapurung Palu']    ?? 0, 'nama_pengunjung' => 'Budi Santoso',   'rating' => 5, 'komentar' => 'Kapurungnya otentik banget, rasa bumbu khas Palu yang susah dicari!',   'created_at' => $now],
            ['id_tempat' => $ids['Bakso Mas Bro']           ?? 0, 'nama_pengunjung' => 'Nur Hidayah',    'rating' => 5, 'komentar' => 'Bakso terenak di Palu! Kuahnya mantap, harganya juga terjangkau.',     'created_at' => $now],
            ['id_tempat' => $ids['Om Ded Pisang Keju']      ?? 0, 'nama_pengunjung' => 'Reza Pratama',   'rating' => 5, 'komentar' => 'Pisang kejunya enak banget, toppingnya melimpah ruah!',                'created_at' => $now],
            ['id_tempat' => $ids['Hj. Mbok Sri Fried Onion']?? 0, 'nama_pengunjung' => 'Dewi Rahayu',   'rating' => 5, 'komentar' => 'Bawang gorengnya renyah dan wangi, oleh-oleh wajib dari Palu!',         'created_at' => $now],
        ];

        // Filter jika id_tempat = 0 (tempat tidak ditemukan)
        $ulasan = array_filter($ulasan, fn($u) => $u['id_tempat'] > 0);

        $this->db->table('ulasan')->insertBatch(array_values($ulasan));

        // Update rating_avg di tabel tempat
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
