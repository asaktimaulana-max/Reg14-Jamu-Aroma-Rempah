<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{

    /* ===============================
       DASHBOARD ADMIN
    =============================== */

    public function index()
    {

        if(!session()->get('logged_in')){
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

        // grafik penjualan
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

        return view('dashboard', $data);
    }


    /* ===============================
       DASHBOARD MITRA FRANCHISE
    =============================== */

    public function mitra()
    {

        if(!session()->get('logged_in')){
            return redirect()->to('/login');
        }

        $id_franchise = session()->get('id_franchise');

        $db = \Config\Database::connect();

        // total transaksi cabang
        $data['total_transaksi'] = $db->table('penjualan')
            ->where('id_franchise',$id_franchise)
            ->countAllResults();

        // omzet cabang
        $omzet = $db->table('penjualan')
            ->selectSum('total')
            ->where('id_franchise',$id_franchise)
            ->get()
            ->getRow();

        $data['total_omzet'] = $omzet->total ?? 0;

        // grafik penjualan cabang
        $data['penjualan'] = $db->table('penjualan')
            ->where('id_franchise',$id_franchise)
            ->get()
            ->getResultArray();

        // transaksi terbaru cabang
        $data['transaksi_terbaru'] = $db->table('penjualan')
            ->select('penjualan.id_penjualan, penjualan.tanggal, penjualan.total, produk_jamu.nama_produk')
            ->join('produk_jamu','produk_jamu.id_produk = penjualan.id_produk')
            ->where('penjualan.id_franchise',$id_franchise)
            ->orderBy('penjualan.id_penjualan','DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        return view('dashboard_mitra', $data);
    }

}