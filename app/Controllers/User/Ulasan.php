<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UlasanModel;
use App\Models\TempatModel;

class Ulasan extends BaseController
{
    public function simpan()
    {
        $ulasanModel = new UlasanModel();
        $tempatModel = new TempatModel();

        $idTempat = $this->request->getPost('id_tempat');

        $ulasanModel->insert([
            'id_tempat'       => $idTempat,
            'nama_pengunjung' => $this->request->getPost('nama_pengunjung'),
            'rating'          => $this->request->getPost('rating'),
            'komentar'        => $this->request->getPost('komentar'),
        ]);

        $rataRating = $ulasanModel->getRataRating($idTempat);
        $tempatModel->update($idTempat, ['rating_avg' => $rataRating]);

        return redirect()->to(base_url('tempat/' . $idTempat));
    }
}
