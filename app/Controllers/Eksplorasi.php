<?php

namespace App\Controllers;

use App\Models\TempatModel;

class Eksplorasi extends BaseController
{
    public function index()
    {
        $model    = new TempatModel();
        $keyword  = $this->request->getGet('q');
        $kategori = $this->request->getGet('kategori');

        // Build query
        $builder = $model->where('status', 'aktif');

        if (!empty($keyword)) {
            $builder = $builder->groupStart()
                               ->like('nama_tempat', $keyword)
                               ->orLike('alamat', $keyword)
                               ->orLike('deskripsi', $keyword)
                               ->groupEnd();
        }

        if (!empty($kategori)) {
            $builder = $builder->where('kategori', $kategori);
        }

        $data = [
            'tempat'   => $builder->findAll(),
            'keyword'  => $keyword,
            'kategori' => $kategori,
        ];

        return view('eksplorasi', $data);
    }
}