<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';

    protected $allowedFields = [
        'id_produk',
        'id_franchise',
        'tanggal',
        'jumlah',
        'total'
    ];
}