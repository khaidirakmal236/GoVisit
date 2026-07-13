<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriInfoSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('kategori_info')->insertBatch([
            [
                'nama'               => 'Wisata',
                'ikon'               => 'mountain',
                'deskripsi_singkat'  => 'Destinasi wisata alam dan budaya di Kota Palu dan sekitarnya',
            ],
            [
                'nama'               => 'Cafe',
                'ikon'               => 'coffee',
                'deskripsi_singkat'  => 'Cafe, kedai kopi, dan kuliner khas yang wajib dicoba',
            ],
            [
                'nama'               => 'Hidden Gem',
                'ikon'               => 'diamond',
                'deskripsi_singkat'  => 'Spot tersembunyi yang belum banyak diketahui wisatawan',
            ],
        ]);
    }
}
