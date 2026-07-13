<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\TempatModel;
use App\Models\UlasanModel;
use App\Models\FotoModel;

class Tempat extends BaseController
{
    public function detail($id)
    {
        $tempatModel = new TempatModel();
        $ulasanModel = new UlasanModel();
        $fotoModel   = new FotoModel();

        $tempat = $tempatModel->find($id);

        if (!$tempat) {
            return redirect()->to(base_url('eksplorasi'));
        }

        $data = [
            'tempat' => $tempat,
            'ulasan' => $ulasanModel->getByTempat($id),
            'foto'   => $fotoModel->getByTempat($id),
        ];

        return view('detail_tempat', $data);
    }
}
