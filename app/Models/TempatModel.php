<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatModel extends Model
{
    protected $table         = 'tempat';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useSoftDeletes = true;

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

    
}
