<!DOCTYPE html>
<html>

<head>

<title>Dashboard Mitra Franchise</title>

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


<div class="container mt-4">

<h4 class="mb-4">Dashboard Penjualan Cabang</h4>

<!-- CARD -->

<div class="row mb-4">

<div class="col-md-6">

<div class="card bg-primary text-white shadow">

<div class="card-body">

<h6>Total Transaksi</h6>

<h4><?= $total_transaksi ?></h4>

</div>

</div>

</div>


<div class="col-md-6">

<div class="card bg-success text-white shadow">

<div class="card-body">

<h6>Total Omzet</h6>

<h4>Rp <?= number_format($total_omzet,0,',','.') ?></h4>

</div>

</div>

</div>

</div>


<!-- GRAFIK -->

<div class="card shadow mb-4">

<div class="card-header">
Grafik Penjualan Cabang
</div>

<div class="card-body">

<canvas id="grafikPenjualan"></canvas>

</div>

</div>


<!-- TRANSAKSI TERBARU -->

<div class="card shadow">

<div class="card-header">
Transaksi Terbaru
</div>

<div class="card-body">

<table class="table table-striped">

<thead>

<tr>

<th>ID</th>
<th>Tanggal</th>
<th>Produk</th>
<th>Total</th>

</tr>

</thead>

<tbody>

<?php foreach($transaksi_terbaru as $t): ?>

<tr>

<td><?= $t['id_penjualan'] ?></td>

<td><?= $t['tanggal'] ?></td>

<td><?= $t['nama_produk'] ?></td>

<td>Rp <?= number_format($t['total'],0,',','.') ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

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
scales:{
y:{
beginAtZero:true
}
}
}
});

</script>

</body>
</html>