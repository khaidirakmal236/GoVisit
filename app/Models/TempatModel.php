<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatModel extends Model
{
    protected $table         = 'tempat';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nama_tempat',
        'kategori',
        'deskripsi',
        'alamat',
        'foto_utama',
        'rating_avg',
        'jam_buka',
        'maps_link',
        'status',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Ambil semua tempat yang aktif
    public function getAktif()
    {
        return $this->where('status', 'aktif')->findAll();
    }

    // Ambil berdasarkan kategori
    public function getByKategori(string $kategori)
    {
        return $this->where('status', 'aktif')
                    ->where('kategori', $kategori)
                    ->findAll();
    }

    // Ambil dengan rata-rata rating terbaru dari tabel ulasan
    public function getWithRating()
    {
        return $this->select('tempat.*, AVG(ulasan.rating) as rating_avg')
                    ->join('ulasan', 'ulasan.id_tempat = tempat.id', 'left')
                    ->where('tempat.status', 'aktif')
                    ->groupBy('tempat.id')
                    ->findAll();
    }
}