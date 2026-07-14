<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TempatSeeder extends Seeder
{
    /**
     * Cari foto otomatis berdasarkan nama tempat.
     * Prioritas: file dengan nama slug tempat (hasil upload admin),
     * lalu fallback ke nama file lama, terakhir null.
     * Contoh: "Kopi Palu Kita" -> kopi-palu-kita.jpg
     */
    private function cariFoto(string $namaTempat, ?string $fallback = null): ?string
    {
        $slug = url_title($namaTempat, '-', true);
        foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
            if (is_file(FCPATH . "uploads/tempat/{$slug}.{$ext}")) {
                return "{$slug}.{$ext}";
            }
        }
        if ($fallback && is_file(FCPATH . 'uploads/tempat/' . $fallback)) {
            return $fallback;
        }
        return null;
    }

    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $tempat = [
            // ── WISATA ──────────────────────────────────────────────
            [
                'nama_tempat' => 'Pantai Taman Ria',
                'kategori'    => 'wisata',
                'deskripsi'   => 'Pantai indah dengan pemandangan Teluk Palu, cocok untuk bersantai dan menikmati sunset',
                'alamat'      => 'Jl. Taman Ria, Palu Barat',
                'foto_utama'  => $this->cariFoto('Pantai Taman Ria', null),
                'rating_avg'  => 4.5,
                'jam_buka'    => '07.00 - 18.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Bukit Salena',
                'kategori'    => 'wisata',
                'deskripsi'   => 'Bukit dengan panorama sunrise terbaik di kota palu, belum banyak yang tahu',
                'alamat'      => 'Palu Selatan',
                'foto_utama'  => $this->cariFoto('Bukit Salena', '1782139981_b5abd22209624902044c.jpeg'),
                'rating_avg'  => 4.6,
                'jam_buka'    => '05.00-10.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Pantai Talise',
                'kategori'    => 'wisata',
                'deskripsi'   => 'Pantai paling terkenal di palu. Cocok buat sunset, jogging, nongkrong malam, dan kulineran pinggir pantai, wisata keluarga',
                'alamat'      => 'Jl. Rajamoili, Talise, Palu Timur',
                'foto_utama'  => $this->cariFoto('Pantai Talise', '1782140389_8af71c493b967b1e4e0f.jpeg'),
                'rating_avg'  => 4.5,
                'jam_buka'    => 'setiap hari 24 jam',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Taipa Beach',
                'kategori'    => 'wisata',
                'deskripsi'   => 'Pantai dengan suasana lebih tenang dibanding talise. View laut dan sunset bagus banget',
                'alamat'      => 'Jl. Taipa Beach, Taipa, Palu Utara',
                'foto_utama'  => $this->cariFoto('Taipa Beach', '1782140196_681a0da2dd4a1da7ea57.jpeg'),
                'rating_avg'  => 4.5,
                'jam_buka'    => '07.00-19.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Gong Perdamaian Palu',
                'kategori'    => 'wisata',
                'deskripsi'   => 'Ikon wisata terkenal di Palu dengan area luas dan spot foto bagus.',
                'alamat'      => 'Jl. Soekarno Hatta, Tondo, Mantikulore',
                'foto_utama'  => $this->cariFoto('Gong Perdamaian Palu', '1782140251_0fa8d6f988251a0d1da2.jpeg'),
                'rating_avg'  => 4.5,
                'jam_buka'    => '08.00-20.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Puncak Selena',
                'kategori'    => 'wisata',
                'deskripsi'   => "Spot view kota Palu dari atas bukit. Malam hari city light-nya cantik banget.\nBest time: sore sampai malam",
                'alamat'      => 'Salena, Palu Barat',
                'foto_utama'  => $this->cariFoto('Puncak Selena', null),
                'rating_avg'  => 4.8,
                'jam_buka'    => 'setiap hari 24 jam',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            // ── CAFE ────────────────────────────────────────────────
            [
                'nama_tempat' => 'Kopi Palu Kita',
                'kategori'    => 'cafe',
                'deskripsi'   => 'Kedai kopi lokal dengan suasana cozy dan menu kopi khas Sulawesi Tengah',
                'alamat'      => 'Jl. Juanda, Palu Timur',
                'foto_utama'  => $this->cariFoto('Kopi Palu Kita', '1782140094_675f6a1797d6e27c0914.jpeg'),
                'rating_avg'  => 4.8,
                'jam_buka'    => '08.00-22.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Kafi Coffee Palu',
                'kategori'    => 'cafe',
                'deskripsi'   => "Nugas\nNongkrong malam aesthetic",
                'alamat'      => "Jl. Panglima Polem, Besusu Barat, Palu Timur\nNo: 0812-8500-0053",
                'foto_utama'  => $this->cariFoto('Kafi Coffee Palu', '1782134539_c0a604698fd7a47495e6.jpeg'),
                'rating_avg'  => 4.8,
                'jam_buka'    => "Senin-Jumat: 10.00-00.00\nSabtu-Minggu: 11.00-00.00",
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Tanaris Coffee',
                'kategori'    => 'cafe',
                'deskripsi'   => 'Nongkrong rame, meeting, kerja kelompok',
                'alamat'      => "Jl. Juanda No.26, Lolu Utara, Palu Timur\nNomor: (0451) 4011763",
                'foto_utama'  => $this->cariFoto('Tanaris Coffee', '1782140107_94fa943a0bd0f34240f7.jpeg'),
                'rating_avg'  => 4.5,
                'jam_buka'    => 'Setiap hari: 07.30-00.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'See You Latte Coffee',
                'kategori'    => 'cafe',
                'deskripsi'   => 'Nongkrong sore, cafe date, foto-foto',
                'alamat'      => 'Jl. Wolter Monginsidi No.33, Lolu Selatan, Palu Selatan',
                'foto_utama'  => $this->cariFoto('See You Latte Coffee', '1782139951_9752cda46f4db53dc4e6.jpeg'),
                'rating_avg'  => 4.4,
                'jam_buka'    => "Senin-Jumat: 09.00-22.00\nSabtu-Minggu: 09.00-23.00",
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Intime Coffee',
                'kategori'    => 'cafe',
                'deskripsi'   => 'Tenang, aesthetic',
                'alamat'      => 'Jl. Tavanjuka Permai, Palupi, Palu Selatan',
                'foto_utama'  => $this->cariFoto('Intime Coffee', '1782140118_8eec04ab8a7b3c84898f.jpeg'),
                'rating_avg'  => 4.7,
                'jam_buka'    => 'Setiap hari: 09.00-23.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'renjanakopi',
                'kategori'    => 'cafe',
                'deskripsi'   => 'from our passion to your cup',
                'alamat'      => 'Jl. Kp. Nelayan No.99, Talise, Kec. Mantikulore, Kota Palu',
                'foto_utama'  => $this->cariFoto('renjanakopi', '1784004995_473697b5a674be778bf1.jpeg'),
                'rating_avg'  => 4.9,
                'jam_buka'    => 'Setiap hari: 16.00-00.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Koriru Coffe',
                'kategori'    => 'cafe',
                'deskripsi'   => 'Temanperjalanamu',
                'alamat'      => 'Jl.Basuki Rahmat,kec. palu selatan',
                'foto_utama'  => $this->cariFoto('Koriru Coffe', '1784004855_cf228651a68b50f25970.jpeg'),
                'rating_avg'  => 4.5,
                'jam_buka'    => 'Setiap hari: 09.00-23.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Norra by ribelv',
                'kategori'    => 'cafe',
                'deskripsi'   => 'finding solace one cup',
                'alamat'      => 'Jl. Yojokodi No.15, palu timur',
                'foto_utama'  => $this->cariFoto('Norra by ribelv', '1784004642_1df55174ba0bdd9d0a03.jpeg'),
                'rating_avg'  => 4.9,
                'jam_buka'    => 'Setiap hari: 09.00-23.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'enola.coffe',
                'kategori'    => 'cafe',
                'deskripsi'   => 'hangat,dan penuh makna',
                'alamat'      => 'Jl. pue Bongo, pengawu,kec. Tatanga,kota palu',
                'foto_utama'  => $this->cariFoto('enola.coffe', '1784010668_4323485e494cd1e87141.jpeg'),
                'rating_avg'  => 4.9,
                'jam_buka'    => 'Setiap hari: 12.00-03.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            // ── HIDDEN GEM ──────────────────────────────────────────
            [
                'nama_tempat' => 'Rumah Kapurung Palu',
                'kategori'    => 'hidden_gem',
                'deskripsi'   => "Hidden culinary gem yang jual makanan khas Sulawesi seperti kapurung.\nCocok untuk konten budaya lokal dan makanan khas",
                'alamat'      => 'Jl. Tomampe No.4, Kabonena, Ulujadi',
                'foto_utama'  => $this->cariFoto('Rumah Kapurung Palu', null),
                'rating_avg'  => 4.7,
                'jam_buka'    => '10.00-21.00',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Bakso Mas Bro',
                'kategori'    => 'hidden_gem',
                'deskripsi'   => 'Tempat bakso hidden gem yang cukup terkenal dikalangan anak muda Palu. Ramai sore sampai malam.',
                'alamat'      => 'Bayaoge, Tatanga, Palu',
                'foto_utama'  => $this->cariFoto('Bakso Mas Bro', '1782140339_4c024f3ee14c640d43fa.jpeg'),
                'rating_avg'  => 5.0,
                'jam_buka'    => '10.00-21.30',
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Om Ded Pisang Keju',
                'kategori'    => 'hidden_gem',
                'deskripsi'   => 'Tempat pisang keju hidden gem dengan konsep sederhana',
                'alamat'      => 'Jl. Dewi Sartika, Petobo, Palu Selatan',
                'foto_utama'  => $this->cariFoto('Om Ded Pisang Keju', null),
                'rating_avg'  => 4.8,
                'jam_buka'    => null,
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'nama_tempat' => 'Hj. Mbok Sri Fried Onion',
                'kategori'    => 'hidden_gem',
                'deskripsi'   => 'Tempat UMKM oleh-oleh khas Palu yang terkenal dengan bawang goreng dan produk lokal.',
                'alamat'      => 'Jl. Dr. Abdurrahman Saleh No.1 Birobuli Utara',
                'foto_utama'  => $this->cariFoto('Hj. Mbok Sri Fried Onion', '1782140527_3baf65a67be3736f8c12.jpeg'),
                'rating_avg'  => 4.6,
                'jam_buka'    => "Senin-Sabtu: 07.00-21.30\nMinggu: 10.00-18.00",
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
             [
                'nama_tempat' => 'sarkop.indonesia',
                'kategori'    => 'hidden_gem',
                'deskripsi'   => 'warkop hiddem gem dengan vibes jatinangor',
                'alamat'      => 'Jl.Tj. satu No.78, Tatura utara, kec. palu selatan',
                'foto_utama'  => $this->cariFoto('sarkop.indonesia', '1784011069_83fea1cddac8a713e04e.jpeg'),
                'rating_avg'  => 4.6,
                'jam_buka'    => "Senin-Sabtu: 07.00-21.30\nMinggu: 10.00-18.00",
                'maps_link'   => null,
                'status'      => 'aktif',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ];

        $this->db->table('tempat')->insertBatch($tempat);
    }
}
