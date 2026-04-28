<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;

class BagiHasil extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $periode = $this->request->getGet('periode');
        $id_franchise = session()->get('id_franchise');

        $builder = $db->table('penjualan p')
            ->select("
                DATE_FORMAT(p.tanggal, '%Y-%m') as periode,
                SUM(p.total) as total_omset,
                SUM(p.total) * 0.8 as bagian_mitra,
                SUM(p.total) * 0.2 as bagi_hasil_pusat
            ")
            ->where('p.id_franchise', $id_franchise)
            ->groupBy("periode");

        if ($periode) {
            $builder->where("DATE_FORMAT(p.tanggal, '%Y-%m') =", $periode);
        }

        $data['bagi_hasil'] = $builder
            ->orderBy('periode', 'DESC')
            ->get()
            ->getResultArray();
 
        $data['periode'] = $periode;

        return view('mitra/bagi_hasil/index', $data);
    }
}
