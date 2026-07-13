<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks supaya truncate tidak error
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');

        // Kosongkan semua tabel dulu (urutan: child dulu, baru parent)
        $this->db->table('ulasan')->truncate();
        $this->db->table('foto')->truncate();
        $this->db->table('tempat')->truncate();
        $this->db->table('kategori_info')->truncate();
        $this->db->table('users')->truncate();

        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');

        // Jalankan semua seeder berurutan
        $this->call('UserSeeder');
        $this->call('KategoriInfoSeeder');
        $this->call('TempatSeeder');
        $this->call('UlasanSeeder');
    }
}
