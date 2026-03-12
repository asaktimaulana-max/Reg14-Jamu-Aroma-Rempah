<!DOCTYPE html>
<html>
<head>

<title>Dashboard Mitra</title>

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

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-success">
<div class="container-fluid">

<span class="navbar-brand">
<i class="bi bi-shop"></i>
Dashboard Mitra Franchise
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

<h5><i class="bi bi-list"></i> Menu Mitra</h5>

<ul class="nav flex-column">

<li class="nav-item">
<a class="nav-link" href="/mitra">
<i class="bi bi-speedometer2"></i> Dashboard Cabang
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/penjualan/tambah">
<i class="bi bi-cart-plus"></i> Input Penjualan
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/penjualan">
<i class="bi bi-table"></i> Data Penjualan
</a>
</li>

</ul>

</div>


<!-- CONTENT -->

<div class="col-md-10 p-4">

<h4 class="mb-4">
Dashboard Penjualan Cabang
<?php if(!empty($cabang)): ?>
- <?= $cabang['nama_cabang']; ?>
<?php endif; ?>
</h4>


<!-- CARD STATISTIK -->

<div class="row mb-4">

<div class="col-md-6">
<div class="card bg-primary text-white shadow">
<div class="card-body">

<h6>Total Transaksi</h6>
<h3><?= $total_transaksi ?></h3>

</div>
</div>
</div>

<div class="col-md-6">
<div class="card bg-success text-white shadow">
<div class="card-body">

<h6>Total Omzet</h6>
<h3>Rp <?= number_format($total_omzet,0,',','.') ?></h3>

</div>
</div>
</div>

</div>


<!-- GRAFIK PENJUALAN -->

<div class="card shadow mb-4">

<div class="card-header">
Grafik Penjualan
</div>

<div class="card-body">

<canvas id="grafikPenjualan"></canvas>

</div>

</div>


<!-- TABEL PENJUALAN -->

<div class="card shadow">

<div class="card-header bg-white fw-semibold">
Data Penjualan Cabang
</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Tanggal</th>
<th>Produk</th>
<th>Jumlah</th>
<th>Total</th>
</tr>
</thead>

<tbody>

<?php if(!empty($penjualan)): ?>

<?php foreach($penjualan as $p): ?>

<tr>
<td><?= $p['id_penjualan'] ?></td>
<td><?= $p['tanggal'] ?></td>
<td><?= $p['nama_produk'] ?></td>
<td><?= $p['jumlah'] ?></td>
<td>Rp <?= number_format($p['total'],0,',','.') ?></td>
</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>
<td colspan="5" class="text-center">
Belum ada data penjualan
</td>
</tr>

<?php endif; ?>

</tbody>

</table>

</div>

</div>

</div>

</div>
</div>


<!-- SCRIPT GRAFIK -->

<script>

const ctx = document.getElementById('grafikPenjualan');

new Chart(ctx, {

type: 'line',

data: {

labels: <?= json_encode($tanggal) ?>,

datasets: [{
label: 'Total Penjualan',
data: <?= json_encode($total_grafik) ?>,
borderWidth: 3,
tension: 0.3,
fill: false
}]

}

});

</script>

</body>
</html>