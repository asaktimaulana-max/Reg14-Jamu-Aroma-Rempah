<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Mitra extends Controller
{

    public function index()
    {

        if(!session()->get('logged_in')){
            return redirect()->to('/login');
        }

        if(session()->get('role') != 'mitra'){
            return redirect()->to('/dashboard');
        }

        $db = \Config\Database::connect();
        $id_franchise = session()->get('id_franchise');

        // data cabang
        $data['cabang'] = $db->table('franchise')
            ->where('id_franchise',$id_franchise)
            ->get()
            ->getRowArray();

        // penjualan
        $data['penjualan'] = $db->table('penjualan')
            ->join('produk_jamu','produk_jamu.id_produk = penjualan.id_produk')
            ->where('penjualan.id_franchise',$id_franchise)
            ->orderBy('penjualan.tanggal','DESC')
            ->get()
            ->getResultArray();

        // total transaksi
        $data['total_transaksi'] = $db->table('penjualan')
            ->where('id_franchise',$id_franchise)
            ->countAllResults();

        // total omzet
        $omzet = $db->table('penjualan')
            ->selectSum('total')
            ->where('id_franchise',$id_franchise)
            ->get()
            ->getRow();

        $data['total_omzet'] = $omzet->total ?? 0;

        // grafik penjualan
        $grafik = $db->query("
            SELECT tanggal, SUM(total) as total
            FROM penjualan
            WHERE id_franchise = $id_franchise
            GROUP BY tanggal
            ORDER BY tanggal
        ")->getResultArray();

        $data['tanggal'] = array_column($grafik,'tanggal');
        $data['total_grafik'] = array_column($grafik,'total');

        // produk terlaris
        $data['produk_laris'] = $db->query("
            SELECT produk_jamu.nama_produk, SUM(penjualan.jumlah) as jumlah
            FROM penjualan
            JOIN produk_jamu ON produk_jamu.id_produk = penjualan.id_produk
            WHERE penjualan.id_franchise = $id_franchise
            GROUP BY produk_jamu.nama_produk
            ORDER BY jumlah DESC
            LIMIT 5
        ")->getResultArray();

        return view('mitra/dashboard',$data);
    }
}