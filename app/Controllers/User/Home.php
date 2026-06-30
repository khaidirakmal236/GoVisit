<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\TempatModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new TempatModel();

        $data = [
            'tempat'     => $model->getAktif(),
            'hidden_gem' => $model->getByKategori('hidden_gem'),
        ];

        return view('beranda', $data);
    }

    public function about_us()
    {
        return view('about-us');
    }

    public function monkey()
    {
        return view('monkey');
    }
}
