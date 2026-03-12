<?php

namespace App\Controllers;

use App\Models\FranchiseModel;

class Franchise extends BaseController
{
    public function index()
    {
        $model = new FranchiseModel();
        $data['franchise'] = $model->findAll();

        return view('franchise/index', $data);
    }

    public function tambah()
    {
        return view('franchise/tambah');
    }

    public function simpan()
    {
        $model = new FranchiseModel();

        $model->save([
            'nama_cabang' => $this->request->getPost('nama_cabang'),
            'pemilik'     => $this->request->getPost('pemilik'),
            'alamat'      => $this->request->getPost('alamat'),
            'kota'        => $this->request->getPost('kota'),
            'no_hp'       => $this->request->getPost('no_hp'),
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('/franchise');
    }

    public function edit($id)
    {
        $model = new FranchiseModel();
        $data['franchise'] = $model->find($id);

        return view('franchise/edit', $data);
    }

    public function update($id)
    {
        $model = new FranchiseModel();

        $model->update($id, [
            'nama_cabang' => $this->request->getPost('nama_cabang'),
            'pemilik'     => $this->request->getPost('pemilik'),
            'alamat'      => $this->request->getPost('alamat'),
            'kota'        => $this->request->getPost('kota'),
            'no_hp'       => $this->request->getPost('no_hp'),
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('/franchise');
    }

    public function hapus($id)
    {
        $model = new FranchiseModel();
        $model->delete($id);

        return redirect()->to('/franchise');
    }
}