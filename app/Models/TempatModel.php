<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatModel extends Model
{
    protected $table            = 'tempat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;

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
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getAktif()
    {
        return $this->where('status', 'aktif')->findAll();
    }

    public function getByKategori($kategori)
{
    return $this->where('kategori', $kategori)
                ->where('status', 'aktif')
                ->findAll();
}
}