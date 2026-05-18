<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GoVisitSeeder extends Seeder
{
    public function run()
    {
        // ── Kategori Info ──────────────────────────────────────────
        $kategori = [
            ['nama' => 'Wisata',     'ikon' => 'mountain',  'deskripsi_singkat' => 'Destinasi wisata alam dan budaya di Kota Palu'],
            ['nama' => 'Cafe',       'ikon' => 'coffee',    'deskripsi_singkat' => 'Cafe dan kedai kopi hits yang wajib dikunjungi'],
            ['nama' => 'Hidden Gem', 'ikon' => 'diamond',   'deskripsi_singkat' => 'Spot tersembunyi yang belum banyak diketahui'],
        ];
        $this->db->table('kategori_info')->insertBatch($kategori);

        // ── Tempat ─────────────────────────────────────────────────
        $tempat = [
            [
                'nama_tempat' => 'Pantai Taman Ria',
                'kategori'    => 'wisata',
                'deskripsi'   => 'Pantai dengan pemandangan Teluk Palu yang indah, cocok untuk bersantai dan menikmati sunset bersama keluarga.',
                'alamat'      => 'Jl. Taman Ria, Palu Barat, Kota Palu',
                'foto_utama'  => 'uploads/pantai_taman_ria.jpg',
                'rating_avg'  => 4.5,
                'jam_buka'    => '07.00 - 18.00',
                'maps_link'   => 'https://maps.google.com/?q=Pantai+Taman+Ria+Palu',
                'status'      => 'aktif',
            ],
            [
                'nama_tempat' => 'Danau Poso',
                'kategori'    => 'wisata',
                'deskripsi'   => 'Salah satu danau terdalam di Indonesia dengan air jernih berwarna biru kehijauan yang memukau.',
                'alamat'      => 'Tentena, Kabupaten Poso, Sulawesi Tengah',
                'foto_utama'  => 'uploads/danau_poso.jpg',
                'rating_avg'  => 4.8,
                'jam_buka'    => '08.00 - 17.00',
                'maps_link'   => 'https://maps.google.com/?q=Danau+Poso',
                'status'      => 'aktif',
            ],
            [
                'nama_tempat' => 'Kopi Palu Kita',
                'kategori'    => 'cafe',
                'deskripsi'   => 'Kedai kopi lokal dengan biji kopi pilihan dari Sulawesi Tengah, suasana cozy dan instagramable.',
                'alamat'      => 'Jl. Juanda No. 12, Palu Timur',
                'foto_utama'  => 'uploads/kopi_palu_kita.jpg',
                'rating_avg'  => 4.8,
                'jam_buka'    => '08.00 - 22.00',
                'maps_link'   => 'https://maps.google.com/?q=Kopi+Palu+Kita',
                'status'      => 'aktif',
            ],
            [
                'nama_tempat' => 'Warung Kopi Tobelo',
                'kategori'    => 'cafe',
                'deskripsi'   => 'Tempat ngopi santai dengan pemandangan kota Palu, menu sederhana dan harga ramah mahasiswa.',
                'alamat'      => 'Jl. Patimura, Palu Selatan',
                'foto_utama'  => 'uploads/warkop_tobelo.jpg',
                'rating_avg'  => 4.3,
                'jam_buka'    => '07.00 - 24.00',
                'maps_link'   => 'https://maps.google.com/?q=Warung+Kopi+Tobelo+Palu',
                'status'      => 'aktif',
            ],
            [
                'nama_tempat' => 'Air Terjun Kalukubula',
                'kategori'    => 'hidden_gem',
                'deskripsi'   => 'Air terjun tersembunyi di Sigi dengan air sejuk alami. Masih sangat jarang dikunjungi dan belum banyak orang tahu.',
                'alamat'      => 'Desa Kalukubula, Kabupaten Sigi',
                'foto_utama'  => 'uploads/airterjun_kalukubula.jpg',
                'rating_avg'  => 4.7,
                'jam_buka'    => '06.00 - 16.00',
                'maps_link'   => 'https://maps.google.com/?q=Air+Terjun+Kalukubula',
                'status'      => 'aktif',
            ],
            [
                'nama_tempat' => 'Bukit Salena',
                'kategori'    => 'hidden_gem',
                'deskripsi'   => 'Bukit dengan panorama sunrise terbaik di Kota Palu. Belum banyak wisatawan yang mengetahui lokasi ini.',
                'alamat'      => 'Palu Selatan, Kota Palu',
                'foto_utama'  => 'uploads/bukit_salena.jpg',
                'rating_avg'  => 4.6,
                'jam_buka'    => '05.00 - 10.00',
                'maps_link'   => 'https://maps.google.com/?q=Bukit+Salena+Palu',
                'status'      => 'aktif',
            ],
        ];
        $this->db->table('tempat')->insertBatch($tempat);

        // ── Ulasan ─────────────────────────────────────────────────
        $ulasan = [
            ['id_tempat' => 1, 'nama_pengunjung' => 'Andi Saputra',   'rating' => 5, 'komentar' => 'Tempatnya bagus, cocok buat foto-foto sore hari!'],
            ['id_tempat' => 1, 'nama_pengunjung' => 'Siti Rahma',     'rating' => 4, 'komentar' => 'Pemandangannya indah, tapi parkir agak susah waktu ramai.'],
            ['id_tempat' => 2, 'nama_pengunjung' => 'Budi Santoso',   'rating' => 5, 'komentar' => 'Airnya bening banget, wajib dikunjungi!'],
            ['id_tempat' => 3, 'nama_pengunjung' => 'Rahma Dewi',     'rating' => 5, 'komentar' => 'Kopinya enak, tempatnya nyaman buat kerja juga.'],
            ['id_tempat' => 3, 'nama_pengunjung' => 'Irfan Maulana',  'rating' => 4, 'komentar' => 'Recommended buat nongkrong, WiFi kencang.'],
            ['id_tempat' => 5, 'nama_pengunjung' => 'Nur Hidayah',    'rating' => 5, 'komentar' => 'Sejuk banget, perjalanannya sedikit tricky tapi worth it!'],
            ['id_tempat' => 6, 'nama_pengunjung' => 'Fauzan Akbar',   'rating' => 5, 'komentar' => 'Sunrise dari sini luar biasa, pasti balik lagi!'],
        ];
        $this->db->table('ulasan')->insertBatch($ulasan);

        // ── Foto ───────────────────────────────────────────────────
        $foto = [
            ['id_tempat' => 1, 'url_foto' => 'uploads/taman_ria_1.jpg', 'keterangan' => 'Pemandangan pantai dari tepi'],
            ['id_tempat' => 1, 'url_foto' => 'uploads/taman_ria_2.jpg', 'keterangan' => 'Sunset di Pantai Taman Ria'],
            ['id_tempat' => 3, 'url_foto' => 'uploads/kopi_palu_1.jpg', 'keterangan' => 'Interior cafe'],
            ['id_tempat' => 3, 'url_foto' => 'uploads/kopi_palu_2.jpg', 'keterangan' => 'Menu andalan kopi susu'],
            ['id_tempat' => 5, 'url_foto' => 'uploads/kalukubula_1.jpg','keterangan' => 'Air terjun utama'],
            ['id_tempat' => 6, 'url_foto' => 'uploads/salena_1.jpg',    'keterangan' => 'Sunrise dari puncak Bukit Salena'],
        ];
        $this->db->table('foto')->insertBatch($foto);
    }
}