<?php

namespace App\Controllers;

class Distribusi extends BaseController
{

public function index()
{

$db = \Config\Database::connect();

$data['distribusi'] = $db->table('stok')
->join('produk_jamu','produk_jamu.id_produk = stok.id_produk')
->join('franchise','franchise.id_franchise = stok.id_franchise')
->select('stok.*, produk_jamu.nama_produk, franchise.nama_cabang')
->get()
->getResultArray();

return view('distribusi/index',$data);

}


public function tambah()
{

$db = \Config\Database::connect();

$data['produk'] = $db->table('produk_jamu')->get()->getResultArray();

$data['franchise'] = $db->table('franchise')->get()->getResultArray();

return view('distribusi/tambah',$data);

}


public function simpan()
{

$db = \Config\Database::connect();

$id_produk = $this->request->getPost('id_produk');
$id_franchise = $this->request->getPost('id_franchise');
$jumlah = $this->request->getPost('jumlah');


$stok = $db->table('stok')
->where('id_produk',$id_produk)
->where('id_franchise',$id_franchise)
->get()
->getRowArray();


if($stok){

$total = $stok['jumlah'] + $jumlah;

$db->table('stok')
->where('id_produk',$id_produk)
->where('id_franchise',$id_franchise)
->update([
'jumlah'=>$total
]);

}else{

$db->table('stok')->insert([
'id_produk'=>$id_produk,
'id_franchise'=>$id_franchise,
'jumlah'=>$jumlah
]);

}

return redirect()->to('/distribusi');

}

}