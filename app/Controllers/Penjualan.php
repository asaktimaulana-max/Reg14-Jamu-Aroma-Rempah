<?php

namespace App\Controllers;

use App\Models\PenjualanModel;
use App\Models\ProdukModel;

class Penjualan extends BaseController
{

    public function index()
    {
        $db = \Config\Database::connect();

        $role = session()->get('role');
        $id_franchise = (int) session()->get('id_franchise');

        $builder = $db->table('penjualan')
            ->join('produk_jamu', 'produk_jamu.id_produk = penjualan.id_produk')
            ->join('franchise', 'franchise.id_franchise = penjualan.id_franchise')
            ->select('penjualan.*, produk_jamu.nama_produk, franchise.nama_cabang');

        // mitra hanya melihat cabangnya sendiri
        if ($role == 'mitra') {
            $builder->where('penjualan.id_franchise', $id_franchise);
        }

        $data['penjualan'] = $builder
            ->orderBy('penjualan.tanggal', 'DESC')
            ->get()
            ->getResultArray();

        return view('penjualan/index', $data);
    }


    public function tambah()
    {
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll();

        return view('penjualan/tambah', $data);
    }


    public function simpan()
    {
        $db = \Config\Database::connect();

        $penjualanModel = new PenjualanModel();
        $produkModel = new ProdukModel();

        $id_produk = (int) $this->request->getPost('id_produk');
        $jumlah    = (int) $this->request->getPost('jumlah');
        $tanggal   = $this->request->getPost('tanggal');

        $id_franchise = (int) session()->get('id_franchise');

        // cek session
        if (!$id_franchise) {
            return redirect()->to('/login');
        }

        // ambil data produk
        $produk = $produkModel->find($id_produk);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        $harga = $produk['harga'];
        $total = $harga * $jumlah;


        /* =========================
           CEK STOK CABANG
        ========================== */

        $stok = $db->table('stok')
            ->where('id_produk', $id_produk)
            ->where('id_franchise', $id_franchise)
            ->get()
            ->getRowArray();

        if (!$stok) {
            return redirect()->back()->with('error', 'Stok cabang tidak tersedia');
        }

        if ($stok['jumlah'] < $jumlah) {
            return redirect()->back()->with('error', 'Stok tidak cukup');
        }


        /* =========================
           SIMPAN PENJUALAN
        ========================== */

        $data = [
            'id_produk'    => $id_produk,
            'id_franchise' => $id_franchise,
            'tanggal'      => $tanggal,
            'jumlah'       => $jumlah,
            'total'        => $total
        ];

        $penjualanModel->insert($data);


        /* =========================
           UPDATE STOK
        ========================== */

        $sisa = $stok['jumlah'] - $jumlah;

        $db->table('stok')
            ->where('id_produk', $id_produk)
            ->where('id_franchise', $id_franchise)
            ->update([
                'jumlah' => $sisa
            ]);


        return redirect()->to('/penjualan')->with('success', 'Penjualan berhasil disimpan');
    }


    public function laporan()
    {
        $db = \Config\Database::connect();

        $role = session()->get('role');
        $id_franchise = (int) session()->get('id_franchise');

        $builder = $db->table('penjualan')
            ->join('produk_jamu', 'produk_jamu.id_produk = penjualan.id_produk')
            ->join('franchise', 'franchise.id_franchise = penjualan.id_franchise')
            ->select('penjualan.*, produk_jamu.nama_produk, franchise.nama_cabang');

        if ($role == 'mitra') {
            $builder->where('penjualan.id_franchise', $id_franchise);
        }

        $data['penjualan'] = $builder
            ->orderBy('penjualan.tanggal', 'DESC')
            ->get()
            ->getResultArray();

        return view('penjualan/laporan', $data);
    }


    public function exportPDF()
    {
        $db = \Config\Database::connect();

        $data['penjualan'] = $db->table('penjualan')
            ->join('produk_jamu', 'produk_jamu.id_produk = penjualan.id_produk')
            ->join('franchise', 'franchise.id_franchise = penjualan.id_franchise')
            ->select('penjualan.*, produk_jamu.nama_produk, franchise.nama_cabang')
            ->orderBy('penjualan.tanggal', 'DESC')
            ->get()
            ->getResultArray();

        $html = view('penjualan/laporan_pdf', $data);

        $dompdf = new \Dompdf\Dompdf();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("laporan_penjualan.pdf", ["Attachment" => false]);
    }

}