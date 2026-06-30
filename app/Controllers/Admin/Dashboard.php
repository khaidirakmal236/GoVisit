<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TempatModel;

class Dashboard extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TempatModel();
    }

    public function index()
    {
        $data = [
            'tempat' => $this->model->findAll(),
        ];
        return view('admin/index', $data);
    }

    public function tambah()
    {
        return view('admin/form');
    }

    public function simpan()
    {
        $namaFoto = null;
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/tempat', $namaFoto);
        }

        $this->model->insert([
            'nama_tempat' => $this->request->getPost('nama_tempat'),
            'kategori'    => $this->request->getPost('kategori'),
            'alamat'      => $this->request->getPost('alamat'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'jam_buka'    => $this->request->getPost('jam_buka'),
            'rating_avg'  => $this->request->getPost('rating_avg') ?? 0,
            'maps_link'   => $this->request->getPost('maps_link'),
            'status'      => $this->request->getPost('status'),
            'foto_utama'  => $namaFoto,
        ]);

        session()->setFlashdata('success', 'Tempat berhasil ditambahkan!');
        return redirect()->to(base_url('admin'));
    }

    public function edit($id)
    {
        $data = [
            'tempat' => $this->model->find($id),
        ];
        return view('admin/form', $data);
    }

    public function update($id)
    {
        $dataLama = $this->model->find($id);
        $namaFoto = $dataLama['foto_utama'] ?? null;

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            if (!empty($namaFoto) && file_exists(FCPATH . 'uploads/tempat/' . $namaFoto)) {
                unlink(FCPATH . 'uploads/tempat/' . $namaFoto);
            }
            $namaFoto = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/tempat', $namaFoto);
        }

        $this->model->update($id, [
            'nama_tempat' => $this->request->getPost('nama_tempat'),
            'kategori'    => $this->request->getPost('kategori'),
            'alamat'      => $this->request->getPost('alamat'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'jam_buka'    => $this->request->getPost('jam_buka'),
            'rating_avg'  => $this->request->getPost('rating_avg'),
            'maps_link'   => $this->request->getPost('maps_link'),
            'status'      => $this->request->getPost('status'),
            'foto_utama'  => $namaFoto,
        ]);

        session()->setFlashdata('success', 'Tempat berhasil diperbarui!');
        return redirect()->to(base_url('admin'));
    }

    public function hapus($id)
    {
        $tempat = $this->model->find($id);

        if (!empty($tempat['foto_utama']) && file_exists(FCPATH . 'uploads/tempat/' . $tempat['foto_utama'])) {
            unlink(FCPATH . 'uploads/tempat/' . $tempat['foto_utama']);
        }

        $this->model->delete($id);

        session()->setFlashdata('success', 'Tempat berhasil dihapus!');
        return redirect()->to(base_url('admin'));
    }
}
