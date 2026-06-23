<?php

namespace App\Controllers;

use App\Models\TempatModel;

class Admin extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TempatModel();
    }

    // Halaman utama admin - daftar semua tempat
    public function index()
    {
        $data = [
            'tempat' => $this->model->findAll(),
        ];
        return view('admin/index', $data);
    }

    // Halaman form tambah tempat
    public function tambah()
    {
        return view('admin/form');
    }

    // Simpan data tempat baru
    public function simpan()
    {
        // 1. Handle upload foto dulu
        $namaFoto = null;
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/tempat', $namaFoto);
        }

        // 2. Insert ke tabel tempat termasuk foto_utama
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

    // Halaman form edit tempat
    public function edit($id)
    {
        $data = [
            'tempat' => $this->model->find($id),
        ];
        return view('admin/form', $data);
    }

    // Update data tempat
    public function update($id)
    {
        $dataLama = $this->model->find($id);
        $namaFoto = $dataLama['foto_utama'] ?? null;

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Hapus foto lama kalau ada
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

    // Hapus tempat
    public function hapus($id)
    {
        $tempat = $this->model->find($id);

        // Hapus file foto kalau ada
        if (!empty($tempat['foto_utama']) && file_exists(FCPATH . 'uploads/tempat/' . $tempat['foto_utama'])) {
            unlink(FCPATH . 'uploads/tempat/' . $tempat['foto_utama']);
        }

        $this->model->delete($id);

        session()->setFlashdata('success', 'Tempat berhasil dihapus!');
        return redirect()->to(base_url('admin'));
    }
}