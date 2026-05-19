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
        $this->model->insert([
            'nama_tempat' => $this->request->getPost('nama_tempat'),
            'kategori'    => $this->request->getPost('kategori'),
            'alamat'      => $this->request->getPost('alamat'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'jam_buka'    => $this->request->getPost('jam_buka'),
            'rating_avg'  => $this->request->getPost('rating_avg') ?? 0,
            'maps_link'   => $this->request->getPost('maps_link'),
            'status'      => $this->request->getPost('status'),
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
        $this->model->update($id, [
            'nama_tempat' => $this->request->getPost('nama_tempat'),
            'kategori'    => $this->request->getPost('kategori'),
            'alamat'      => $this->request->getPost('alamat'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'jam_buka'    => $this->request->getPost('jam_buka'),
            'rating_avg'  => $this->request->getPost('rating_avg'),
            'maps_link'   => $this->request->getPost('maps_link'),
            'status'      => $this->request->getPost('status'),
        ]);

        session()->setFlashdata('success', 'Tempat berhasil diperbarui!');
        return redirect()->to(base_url('admin'));
    }

    // Hapus tempat
    public function hapus($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Tempat berhasil dihapus!');
        return redirect()->to(base_url('admin'));
    }
}