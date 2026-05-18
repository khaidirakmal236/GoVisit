<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $table         = 'foto';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';

    protected $allowedFields = [
        'id_tempat',
        'url_foto',
        'keterangan',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Ambil semua foto berdasarkan id tempat
    public function getByTempat(int $idTempat)
    {
        return $this->where('id_tempat', $idTempat)->findAll();
    }
}