<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();

        // total franchise
        $data['total_franchise'] = $db->table('franchise')->countAllResults();

        // total produk
        $data['total_produk'] = $db->table('produk_jamu')->countAllResults();

        // total transaksi
        $data['total_transaksi'] = $db->table('penjualan')->countAllResults();

        // total omzet
        $omzet = $db->table('penjualan')
            ->selectSum('total')
            ->get()
            ->getRow();

        $data['total_omzet'] = $omzet->total ?? 0;

        // semua data penjualan (untuk grafik)
        $data['penjualan'] = $db->table('penjualan')
            ->get()
            ->getResultArray();

        // transaksi terbaru
        $data['transaksi_terbaru'] = $db->table('penjualan')
            ->select('penjualan.id_penjualan, penjualan.tanggal, penjualan.total, franchise.nama_cabang, produk_jamu.nama_produk')
            ->join('franchise','franchise.id_franchise = penjualan.id_franchise')
            ->join('produk_jamu','produk_jamu.id_produk = penjualan.id_produk')
            ->orderBy('penjualan.id_penjualan','DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        // produk terlaris
        $data['produk_terlaris'] = $db->table('penjualan')
            ->select('produk_jamu.nama_produk, SUM(penjualan.jumlah) as total_jual')
            ->join('produk_jamu','produk_jamu.id_produk = penjualan.id_produk')
            ->groupBy('produk_jamu.id_produk')
            ->orderBy('total_jual','DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        // cabang terlaris
        $data['cabang_terlaris'] = $db->table('penjualan')
            ->select('franchise.nama_cabang, SUM(penjualan.total) as total_penjualan')
            ->join('franchise','franchise.id_franchise = penjualan.id_franchise')
            ->groupBy('franchise.id_franchise')
            ->orderBy('total_penjualan','DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        return view('admin/dashboard', $data);
    }
}