<!DOCTYPE html>
<html>
<head>

<title>Dashboard Jamu Aroma Rempah</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

body{
background:#f4f6f9;
font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
}

.navbar{
box-shadow:0 2px 6px rgba(0,0,0,0.1);
}

.sidebar{
height:100vh;
background:white;
border-right:1px solid #e0e0e0;
}

.sidebar h5{
font-weight:600;
margin-bottom:20px;
}

.sidebar .nav-link{
color:#333;
margin-bottom:5px;
border-radius:6px;
}

.sidebar .nav-link:hover{
background:#198754;
color:white;
}

.card{
border:none;
border-radius:10px;
}

.card-body h4{
font-weight:bold;
}

#grafikPenjualan{
height:200px;
}

.dashboard-table{
max-height:180px;
overflow-y:auto;
}

.page-title{
font-weight:600;
}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-success">
<div class="container-fluid">

<span class="navbar-brand">
<i class="bi bi-cup-hot"></i>
Sistem Monitoring Jamu Aroma Rempah
</span>

<a href="/logout" class="btn btn-light btn-sm">
Logout
</a>

</div>
</nav>


<div class="container-fluid">
<div class="row">

<!-- SIDEBAR -->

<div class="col-md-2 sidebar p-3">

<h5><i class="bi bi-list"></i> Menu</h5>

<ul class="nav flex-column">

<li class="nav-item">
<a class="nav-link" href="/admin/dashboard">
<i class="bi bi-speedometer2"></i> Dashboard
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/admin/franchise">
<i class="bi bi-shop"></i> Data Franchise
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/admin/produk">
<i class="bi bi-capsule"></i> Produk Jamu
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="<?= base_url('admin/bahan') ?>">
<i class="bi bi-box-seam"></i>
<span>Data Bahan Baku</span>
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="<?= base_url('admin/pemesanan') ?>">
<i class="bi bi-cart"></i>
<span>Pemesanan Bahan</span>
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/penjualan">
<i class="bi bi-cart"></i> Penjualan
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/laporan">
<i class="bi bi-bar-chart"></i> Laporan Penjualan
</a>
</li>

</ul>

</div>


<!-- CONTENT -->

<div class="col-md-10 p-4">

<h4 class="page-title mb-4">
Dashboard Monitoring Penjualan
</h4>


<!-- CARD STATISTIK -->

<div class="row mb-4">

<div class="col-md-3">
<div class="card bg-info text-white shadow">
<div class="card-body">
<h6>Total Franchise</h6>
<h4><?= $total_franchise ?></h4>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-primary text-white shadow">
<div class="card-body">
<h6>Total Produk</h6>
<h4><?= $total_produk ?></h4>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-success text-white shadow">
<div class="card-body">
<h6>Total Transaksi</h6>
<h4><?= $total_transaksi ?></h4>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-warning text-white shadow">
<div class="card-body">
<h6>Total Omzet</h6>
<h4>Rp <?= number_format($total_omzet,0,',','.') ?></h4>
</div>
</div>
</div>

</div>


<!-- GRAFIK -->

<div class="card shadow mb-4">

<div class="card-header bg-white fw-semibold">
Grafik Penjualan
</div>

<div class="card-body">
<canvas id="grafikPenjualan"></canvas>
</div>

</div>


<div class="row">

<!-- TRANSAKSI TERBARU -->

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-white fw-semibold">
Transaksi Terbaru
</div>

<div class="card-body dashboard-table">

<table class="table table-sm table-hover">

<thead class="table-light">
<tr>
<th>ID</th>
<th>Cabang</th>
<th>Produk</th>
<th>Tanggal</th>
<th>Total</th>
</tr>
</thead>

<tbody>

<?php foreach($transaksi_terbaru as $t): ?>

<tr>
<td><?= $t['id_penjualan'] ?></td>
<td><?= $t['nama_cabang'] ?></td>
<td><?= $t['nama_produk'] ?></td>
<td><?= $t['tanggal'] ?></td>
<td>Rp <?= number_format($t['total'],0,',','.') ?></td>
</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

</div>


<!-- PRODUK TERLARIS -->

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-white fw-semibold">
Produk Terlaris
</div>

<div class="card-body dashboard-table">

<table class="table table-sm table-hover">

<thead class="table-light">
<tr>
<th>Nama Produk</th>
<th>Total Terjual</th>
</tr>
</thead>

<tbody>

<?php foreach($produk_terlaris as $p): ?>

<tr>
<td><?= $p['nama_produk'] ?></td>
<td><?= $p['total_jual'] ?></td>
</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

</div>

</div>


<!-- CABANG TERLARIS -->

<div class="row mt-3">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-white fw-semibold">
Cabang Terlaris
</div>

<div class="card-body dashboard-table">

<table class="table table-sm table-hover">

<thead class="table-light">
<tr>
<th>Cabang</th>
<th>Total Penjualan</th>
</tr>
</thead>

<tbody>

<?php foreach($cabang_terlaris as $c): ?>

<tr>
<td><?= $c['nama_cabang'] ?></td>
<td>Rp <?= number_format($c['total_penjualan'],0,',','.') ?></td>
</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

</div>

</div>
</div>


<?php
$dataPenjualan=[];
$labelTanggal=[];

foreach($penjualan as $p){
$dataPenjualan[]=$p['total'];
$labelTanggal[]=$p['tanggal'];
}
?>

<script>

const dataPenjualan = <?= json_encode($dataPenjualan) ?>;
const labelTanggal = <?= json_encode($labelTanggal) ?>;

const ctx = document.getElementById('grafikPenjualan');

new Chart(ctx,{
type:'bar',
data:{
labels:labelTanggal,
datasets:[{
label:'Total Penjualan',
data:dataPenjualan,
backgroundColor:'rgba(25,135,84,0.7)'
}]
},
options:{
responsive:true,
maintainAspectRatio:false,
scales:{
y:{beginAtZero:true}
}
}
});

</script>

</body>
</html>