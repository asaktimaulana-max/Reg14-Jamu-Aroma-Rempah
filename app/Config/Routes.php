<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


/*
|--------------------------------------------------------------------------
| DEFAULT
|--------------------------------------------------------------------------
*/

$routes->get('/', 'Login::index');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/ 

$routes->get('/login', 'Login::index');
$routes->post('/login/proses', 'Login::proses');
$routes->get('/logout', 'Login::logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

$routes->get('/dashboard', 'Dashboard::index');


/*
|--------------------------------------------------------------------------
| DASHBOARD MITRA
|--------------------------------------------------------------------------
*/

$routes->get('/mitra', 'Mitra::index');


/*
|--------------------------------------------------------------------------
| FRANCHISE
|--------------------------------------------------------------------------
*/

$routes->get('/franchise','Franchise::index');
$routes->get('/franchise/tambah','Franchise::tambah');
$routes->post('/franchise/simpan','Franchise::simpan');
$routes->get('/franchise/edit/(:num)','Franchise::edit/$1');
$routes->post('/franchise/update/(:num)','Franchise::update/$1');
$routes->get('/franchise/hapus/(:num)','Franchise::hapus/$1');


/*
|--------------------------------------------------------------------------
| PRODUK
|--------------------------------------------------------------------------
*/

$routes->get('/produk','Produk::index');
$routes->get('/produk/tambah','Produk::tambah');
$routes->post('/produk/simpan','Produk::simpan');
$routes->get('/produk/edit/(:num)','Produk::edit/$1');
$routes->post('/produk/update/(:num)','Produk::update/$1');
$routes->get('/produk/hapus/(:num)','Produk::hapus/$1');


/*
|--------------------------------------------------------------------------
| STOK
|--------------------------------------------------------------------------
*/

$routes->get('/stok','Stok::index');
$routes->get('/stok/edit/(:num)','Stok::edit/$1');
$routes->post('/stok/update','Stok::update');


/*
|--------------------------------------------------------------------------
| DISTRIBUSI STOK
|--------------------------------------------------------------------------
*/

$routes->get('/distribusi','Distribusi::index');
$routes->get('/distribusi/tambah','Distribusi::tambah');
$routes->post('/distribusi/simpan','Distribusi::simpan');


/*
|--------------------------------------------------------------------------
| PENJUALAN
|--------------------------------------------------------------------------
*/

$routes->get('/penjualan','Penjualan::index');
$routes->get('/penjualan/tambah','Penjualan::tambah');
$routes->post('/penjualan/simpan','Penjualan::simpan');


/*
|--------------------------------------------------------------------------
| LAPORAN
|--------------------------------------------------------------------------
*/

$routes->get('/laporan','Penjualan::laporan');
$routes->get('/laporan/pdf','Penjualan::exportPDF');