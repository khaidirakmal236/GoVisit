<?php

namespace App\Models;

use CodeIgniter\Model;

class UlasanModel extends Model
{
    protected $table         = 'ulasan';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';

    protected $allowedFields = [
        'id_tempat',
        'nama_pengunjung',
        'rating',
        'komentar',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Ambil semua ulasan berdasarkan id tempat
    public function getByTempat(int $idTempat)
    {
        return $this->where('id_tempat', $idTempat)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    // Hitung rata-rata rating suatu tempat
    public function getRataRating(int $idTempat): float
    {
        $result = $this->selectAvg('rating', 'rata_rating')
                       ->where('id_tempat', $idTempat)
                       ->first();

        return round((float) ($result['rata_rating'] ?? 0), 1);
    }
}