<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\TempatModel;

class HiddenGem extends BaseController
{
    public function index()
    {
        $model = new TempatModel();

        $data = [
            'hidden_gem' => $model->getByKategori('hidden_gem'),
        ];

        return view('hidden_gem', $data);
    }
}
