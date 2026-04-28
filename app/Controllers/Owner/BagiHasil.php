<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class BagiHasil extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $periode = $this->request->getGet('periode');

        $builder = $db->table('penjualan p')
            ->select("
                DATE_FORMAT(p.tanggal, '%Y-%m') as periode,
                f.nama_cabang,
                SUM(p.total) as total_omset,
                SUM(p.total) * 0.8 as bagian_mitra,
                SUM(p.total) * 0.2 as bagi_hasil_pusat
            ")
            ->join('franchise f', 'f.id_franchise = p.id_franchise')
            ->groupBy("periode, p.id_franchise");

        if ($periode) {
            $builder->where("DATE_FORMAT(p.tanggal, '%Y-%m') =", $periode);
        }

        $data['bagi_hasil'] = $builder
            ->orderBy('periode', 'DESC')
            ->get()
            ->getResultArray();

        $data['periode'] = $periode;

        return view('owner/bagi_hasil/index', $data);
    }
}