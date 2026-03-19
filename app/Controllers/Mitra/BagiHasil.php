<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;

class BagiHasil extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $id_franchise = session()->get('id_franchise');

        $data['bagi_hasil'] = $db->table('bagi_hasil')
            ->where('id_franchise', $id_franchise)
            ->orderBy('periode', 'DESC')
            ->get()
            ->getResultArray();

        return view('mitra/bagi_hasil/index', $data);
    }

    public function generate()
    {
        $db = \Config\Database::connect();
        $id_franchise = session()->get('id_franchise');

        // 🔥 periode sekarang (YYYY-MM)
        $periode = date('Y-m');

        // 🔥 CEK BIAR TIDAK DOUBLE
        $cek = $db->table('bagi_hasil')
            ->where('id_franchise', $id_franchise)
            ->where('periode', $periode)
            ->countAllResults();

        if ($cek > 0) {
            return redirect()->back()->with('error', 'Bagi hasil bulan ini sudah dibuat!');
        }

        // 🔥 HITUNG TOTAL OMSET BULAN INI
        $total = $db->table('penjualan')
            ->selectSum('total')
            ->where('id_franchise', $id_franchise)
            ->where('DATE_FORMAT(tanggal, "%Y-%m")', $periode)
            ->get()
            ->getRow()
            ->total ?? 0;

        // 🔥 BAGI HASIL
        $bagi_pusat = $total * 0.2;
        $bagi_mitra = $total * 0.8;

        // 🔥 SIMPAN
        $db->table('bagi_hasil')->insert([
            'id_franchise' => $id_franchise,
            'periode' => $periode,
            'total_omset' => $total,
            'bagi_hasil_pusat' => $bagi_pusat,
            'bagian_mitra' => $bagi_mitra
        ]);

        return redirect()->to('/mitra/bagi_hasil')
            ->with('success', 'Bagi hasil berhasil dibuat!');
    }
}