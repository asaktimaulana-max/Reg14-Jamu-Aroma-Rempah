<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
$routes->get('/', 'Login::index');
$routes->get('login', 'Login::index');
$routes->post('login/proses', 'Login::proses');
$routes->get('logout', 'Login::logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
$routes->get('admin/dashboard', 'Admin\Dashboard::index');
$routes->get('mitra/dashboard', 'Mitra\Dashboard::index');
$routes->get('owner/dashboard', 'Owner\Dashboard::index');


/*
|--------------------------------------------------------------------------
| FRANCHISE
|--------------------------------------------------------------------------
*/
$routes->get('admin/franchise','Admin\Franchise::index');
$routes->get('admin/franchise/tambah','Admin\Franchise::tambah');
$routes->post('admin/franchise/simpan','Admin\Franchise::simpan');
$routes->get('admin/franchise/edit/(:num)','Admin\Franchise::edit/$1');
$routes->post('admin/franchise/update/(:num)','Admin\Franchise::update/$1');
$routes->get('admin/franchise/hapus/(:num)','Admin\Franchise::hapus/$1');


/*
|--------------------------------------------------------------------------
| PRODUK JAMU (ADMIN)
|--------------------------------------------------------------------------
*/
$routes->get('admin/produk','Admin\Produk::index');
$routes->get('admin/produk/tambah','Admin\Produk::tambah');
$routes->post('admin/produk/simpan','Admin\Produk::simpan');
$routes->get('admin/produk/edit/(:num)','Admin\Produk::edit/$1');
$routes->post('admin/produk/update/(:num)','Admin\Produk::update/$1');
$routes->get('admin/produk/hapus/(:num)','Admin\Produk::hapus/$1');


/*
|--------------------------------------------------------------------------
| BAHAN BAKU (ADMIN)
|--------------------------------------------------------------------------
*/

$routes->get('admin/bahan', 'Admin\Bahan::index');
$routes->get('admin/bahan/tambah','Admin\Bahan::tambah');
$routes->post('admin/bahan/simpan','Admin\Bahan::simpan');
$routes->get('admin/bahan/edit/(:num)','Admin\Bahan::edit/$1');
$routes->post('admin/bahan/update/(:num)','Admin\Bahan::update/$1');
$routes->get('admin/bahan/hapus/(:num)','Admin\Bahan::hapus/$1');


/*
|--------------------------------------------------------------------------
| PEMESANAN BAHAN (ADMIN) ✅ FIX
|--------------------------------------------------------------------------
*/
$routes->group('admin', function($routes){
    $routes->get('pemesanan', 'Admin\Pemesanan::index');
    $routes->get('pemesanan/proses/(:num)', 'Admin\Pemesanan::proses/$1');
    $routes->get('pemesanan/kirim/(:num)', 'Admin\Pemesanan::kirim/$1');
    $routes->get('pemesanan/selesai/(:num)', 'Admin\Pemesanan::selesai/$1');
    $routes->get('pemesanan/tolak/(:num)', 'Admin\Pemesanan::tolak/$1');
});


/*
|--------------------------------------------------------------------------
| PEMESANAN BAHAN (MITRA)
|--------------------------------------------------------------------------
*/
$routes->group('mitra', function($routes){
    $routes->get('pemesanan', 'Mitra\Pemesanan::index');
    $routes->get('pemesanan/tambah', 'Mitra\Pemesanan::tambah');
    $routes->post('pemesanan/simpan', 'Mitra\Pemesanan::simpan');
});


/*
|--------------------------------------------------------------------------
| PENJUALAN ADMIN
|--------------------------------------------------------------------------
*/
$routes->get('penjualan','Penjualan::index');
$routes->get('penjualan/tambah','Penjualan::tambah');
$routes->post('penjualan/simpan','Penjualan::simpan');


/*
|--------------------------------------------------------------------------
| PENJUALAN MITRA
|--------------------------------------------------------------------------
*/
$routes->get('mitra/penjualan','Mitra\Penjualan::index');
$routes->get('mitra/penjualan/tambah','Mitra\Penjualan::tambah');
$routes->post('mitra/penjualan/simpan','Mitra\Penjualan::simpan');


/*
|--------------------------------------------------------------------------
| LAPORAN
|--------------------------------------------------------------------------
*/
$routes->get('laporan','Penjualan::laporan');
$routes->get('laporan/pdf','Penjualan::exportPDF');

//bagi hasil

$routes->group('mitra', function($routes){
    $routes->get('bagi_hasil', 'Mitra\BagiHasil::index');
    $routes->get('bagi_hasil/generate', 'Mitra\BagiHasil::generate');
});

// owner

$routes->group('owner', function($routes){
    $routes->get('dashboard', 'Owner\Dashboard::index');
    $routes->get('bagi_hasil', 'Owner\BagiHasil::index');
    $routes->get('laporan/omset', 'Owner\Laporan::omset');
    $routes->get('laporan/pdf', 'Owner\Laporan::exportPdf');
    $routes->get('owner/dashboard', 'Owner\Dashboard::index');
});

// mitra detail

$routes->get('mitra/penjualan/detail/(:num)', 'Mitra\Penjualan::detail/$1');