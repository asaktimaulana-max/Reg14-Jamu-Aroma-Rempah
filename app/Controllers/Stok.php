<?php

namespace App\Controllers;

class Stok extends BaseController
{

public function index()
{

$db = \Config\Database::connect();

$data['stok'] = $db->table('stok')
->select('stok.*, produk_jamu.nama_produk, franchise.nama_cabang')
->join('produk_jamu','produk_jamu.id_produk = stok.id_produk')
->join('franchise','franchise.id_franchise = stok.id_franchise')
->get()
->getResultArray();

return view('stok/index', $data);

}

public function edit($id)
{

$db = \Config\Database::connect();

$data['stok'] = $db->table('stok')
->where('id_stok', $id)
->get()
->getRowArray();

return view('stok/edit', $data);

}

public function update()
{

$db = \Config\Database::connect();

$id = $this->request->getPost('id_stok');
$jumlah = $this->request->getPost('jumlah');

$db->table('stok')
->where('id_stok',$id)
->update([
'jumlah' => $jumlah
]);

return redirect()->to('/stok');

}

}