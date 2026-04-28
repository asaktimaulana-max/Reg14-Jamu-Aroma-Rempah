<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('landing/portfolio');
    }
}
