<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 🔥 DEBUG (sementara)
        // dd(session()->get());

        // cek login
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }

        // cek role
        if ($arguments) {
            if (!in_array(session()->get('role'), $arguments)) {
                return redirect()->to('/login')->with('error', 'Akses ditolak');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}