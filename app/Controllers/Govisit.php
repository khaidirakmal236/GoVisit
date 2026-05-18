<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\TempatModel;
use App\Models\TipsModel;
use App\Models\CatatanTimModel;
use App\Models\AnggotaTimModel;

/**
 * GoVisit Controller
 * Mengelola 5 halaman utama platform GoVisit.
 * Semua data diambil dari database melalui Model.
 */
class GoVisit extends BaseController
{
    // ----------------------------------------------------------------
    // 1. BERANDA
    // ----------------------------------------------------------------
    public function beranda(): string
    {
        $tempatModel   = new TempatModel();
        $kategoriModel = new KategoriModel();
        $anggotaModel  = new AnggotaTimModel();

        // Hitung statistik dari database
        $jumlahTempat = $tempatModel->countAll();
        $semuaKota    = array_unique(array_column($tempatModel->select('kota')->findAll(), 'kota'));
        $jumlahKota   = count($semuaKota);
        $jumlahTim    = $anggotaModel->countAll();

        $data = [
            'title'    => 'Beranda — GoVisit',
            'heading'  => 'Temukan Tempat Terbaik di Sekitarmu',
            'tagline'  => 'Rekomendasi tempat wisata, cafe hits, dan hidden gems yang sudah kami kunjungi dan verifikasi sendiri — jujur, akurat, tanpa iklan.',
            'stats'    => [
                ['angka' => $jumlahTempat . '+', 'label' => 'Tempat Terkurasi'],
                ['angka' => $jumlahKota . '+',   'label' => 'Kota di Indonesia'],
                ['angka' => (string) $jumlahTim, 'label' => 'Anggota Tim GoVisit'],
            ],
            'kategori' => $kategoriModel->findAll(),
        ];

        return view('govisit/beranda', $data);
    }

    // ----------------------------------------------------------------
    // 2. EKSPLORASI
    // ----------------------------------------------------------------
    public function eksplorasi(): string
    {
        $tempatModel = new TempatModel();

        $data = [
            'title'   => 'Eksplorasi — GoVisit',
            'heading' => 'Eksplorasi Semua Tempat',
            'tempat'  => $tempatModel->getAllWithKategori(),
        ];

        return view('govisit/eksplorasi', $data);
    }

    // ----------------------------------------------------------------
    // 3. DETAIL TEMPAT
    // ----------------------------------------------------------------
    public function detail(int $id = 1): string
    {
        $tempatModel  = new TempatModel();
        $tipsModel    = new TipsModel();
        $catatanModel = new CatatanTimModel();

        // Ambil data tempat + nama kategori
        $tempat = $tempatModel->getDetailById($id);

        // Jika ID tidak ditemukan, tampilkan halaman 404
        if (!$tempat) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Tempat dengan ID ' . $id . ' tidak ditemukan.'
            );
        }

        // Ambil tips → ambil teks 'isi' saja sebagai array flat
        $tipsRaw = $tipsModel->getByTempat($id);
        $tips    = array_column($tipsRaw, 'isi');

        $data = [
            'title'       => $tempat['nama'] . ' — GoVisit',
            'heading'     => $tempat['nama'],
            'kategori'    => $tempat['kategori'],
            'kota'        => $tempat['kota'],
            'alamat'      => $tempat['alamat'],
            'jam_buka'    => $tempat['jam_buka'],
            'skor'        => $tempat['skor'],
            'deskripsi'   => $tempat['deskripsi'],
            'tips'        => $tips,
            'catatan_tim' => $catatanModel->getByTempat($id),
        ];

        return view('govisit/detail', $data);
    }

    // ----------------------------------------------------------------
    // 4. LOGIN
    // ----------------------------------------------------------------
    public function login(): string
    {
        $data = [
            'title'   => 'Masuk — GoVisit',
            'heading' => 'Portal Tim GoVisit',
            'subtext' => 'Akses khusus untuk anggota tim dalam mengelola konten dan rekomendasi.',
        ];

        return view('govisit/login', $data);
    }

    // ----------------------------------------------------------------
    // 5. TENTANG KAMI
    // ----------------------------------------------------------------
    public function tentang(): string
    {
        $anggotaModel = new AnggotaTimModel();

        $data = [
            'title'   => 'Tentang Kami — GoVisit',
            'heading' => 'Tentang GoVisit',
            'visi'    => 'Menjadi platform rekomendasi perjalanan terpercaya nomor satu di Indonesia yang menghubungkan traveler dengan tempat-tempat terbaik melalui komunitas yang jujur dan autentik.',
            'misi'    => [
                'Mengkurasi tempat wisata, cafe, dan hidden gems terbaik di seluruh Indonesia.',
                'Membangun komunitas traveler yang aktif, jujur, dan saling menginspirasi.',
                'Memberikan informasi akurat, terkini, dan bermanfaat bagi setiap pengunjung.',
                'Mendukung ekonomi lokal dengan mempromosikan destinasi-destinasi tersembunyi.',
            ],
            'nilai'   => [
                ['judul' => 'Jujur',     'isi' => 'Semua review dan rekomendasi datang dari pengalaman nyata komunitas kami.'],
                ['judul' => 'Autentik',  'isi' => 'Kami hanya menampilkan tempat yang benar-benar layak dikunjungi, bukan iklan berbayar.'],
                ['judul' => 'Komunitas', 'isi' => 'GoVisit dibangun dari dan untuk para traveler — suara kalian adalah kekuatan kami.'],
                ['judul' => 'Inklusif',  'isi' => 'Dari budget backpacker hingga wisata mewah — kami punya rekomendasi untuk semua.'],
            ],
            // Tim diambil dari database, diurutkan berdasarkan kolom 'urutan'
            'tim'     => $anggotaModel->orderBy('urutan', 'ASC')->findAll(),
            'kontak'  => [
                'email'   => 'halo@govisit.com',
                'telepon' => '+62 812-3456-7890',
                'alamat'  => 'Jakarta, Indonesia',
            ],
        ];

        return view('govisit/tentang', $data);
    }
}
