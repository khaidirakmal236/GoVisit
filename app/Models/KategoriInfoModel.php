<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriInfoModel extends Model
{
    protected $table            = 'kategori_info';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;

    protected $allowedFields = [
        'nama',
        'ikon',
        'deskripsi_singkat',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}