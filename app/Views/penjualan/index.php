<!DOCTYPE html>
<html>

<head>

<title>Data Penjualan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f5f6fa;">

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white d-flex justify-content-between">

<h4 class="mb-0">Data Penjualan</h4>

<a href="/penjualan/tambah" class="btn btn-light btn-sm">
Tambah Penjualan
</a>

</div>

<div class="card-body">

<table class="table table-striped table-bordered text-center">

<thead class="table-dark">

<tr>

<th>No</th>
<th>Cabang</th>
<th>Produk</th>
<th>Tanggal</th>
<th>Jumlah</th>
<th>Total</th>

</tr>

</thead>

<tbody>

<?php $no=1; foreach($penjualan as $p): ?>

<tr>

<td><?= $no++ ?></td>

<td><?= $p['nama_cabang'] ?></td>

<td><?= $p['nama_produk'] ?></td>

<td><?= $p['tanggal'] ?></td>

<td><?= $p['jumlah'] ?></td>

<td>
Rp <?= number_format($p['total'],0,',','.') ?>
</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

<a href="/dashboard" class="btn btn-secondary">
Kembali ke Dashboard
</a>

</div>

</div>

</div>

</body>
</html>