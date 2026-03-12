<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function proses()
    {
        $db = \Config\Database::connect();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // ambil data user
        $user = $db->table('user')
            ->where('username', $username)
            ->get()
            ->getRowArray();

        // cek user
        if (!$user) {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }

        // cek password
        if ($password != $user['password']) {
            return redirect()->back()->with('error', 'Password salah');
        }

        // buat session login
        session()->set([
            'id_user'      => $user['id_user'],
            'username'     => $user['username'],
            'role'         => $user['role'],
            'id_franchise' => $user['id_franchise'], // penting untuk penjualan
            'logged_in'    => true
        ]);

        // redirect berdasarkan role
        switch ($user['role']) {

            case 'admin':
                return redirect()->to('/dashboard');

            case 'mitra':
                return redirect()->to('/mitra');

            case 'owner':
                return redirect()->to('/owner');

            default:
                return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}