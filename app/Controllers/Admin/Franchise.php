<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FranchiseModel;

class Franchise extends BaseController
{
    public function index()
    {
        $model = new FranchiseModel();

        $data['franchise'] = $model->findAll();

        return view('admin/franchise/index', $data);
    }

    public function tambah()
    {
        return view('admin/franchise/tambah');
    }

    public function simpan()
    {
        $model = new FranchiseModel();

        $model->save([
            'nama_cabang' => $this->request->getPost('nama_cabang'),
            'pemilik'     => $this->request->getPost('pemilik'),
            'alamat'      => $this->request->getPost('alamat'),
            'no_hp'       => $this->request->getPost('no_hp'),
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('/admin/franchise');
    }

    public function edit($id)
    {
        $model = new FranchiseModel();

        $data['franchise'] = $model->find($id);

        return view('admin/franchise/edit', $data);
    }

    public function update($id)
    {
        $model = new FranchiseModel();

        $model->update($id, [
            'nama_cabang' => $this->request->getPost('nama_cabang'),
            'pemilik'     => $this->request->getPost('pemilik'),
            'alamat'      => $this->request->getPost('alamat'),
            'no_hp'       => $this->request->getPost('no_hp'),
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('/admin/franchise');
    }

    public function hapus($id)
    {
        $db = \Config\Database::connect();

        $db->table('bagi_hasil')
            ->where('id_franchise', $id)
            ->delete();

        $db->table('pemesanan_bahan')
            ->where('id_franchise', $id)
            ->delete();

        $db->table('user')
            ->where('id_franchise', $id)
            ->delete();

        $db->table('penjualan')
            ->where('id_franchise', $id)
            ->delete();

        $model = new FranchiseModel();
        $model->delete($id);

        return redirect()->to('/admin/franchise')
            ->with('success', 'Data franchise berhasil dihapus.');
    }
}