<!DOCTYPE html>
<html>

<head>

<title>Laporan Penjualan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Laporan Penjualan</h3>

<a href="/laporan/pdf" class="btn btn-danger mb-3">
Export PDF
</a>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Tanggal</th>
<th>Jumlah</th>
<th>Total</th>

</tr>

<?php foreach($penjualan as $p): ?>

<tr>

<td><?= $p['id_penjualan'] ?></td>
<td><?= $p['tanggal'] ?></td>
<td><?= $p['jumlah'] ?></td>
<td>Rp <?= number_format($p['total']) ?></td>

</tr>

<?php endforeach; ?>

</table>

</div>

</body>

</html>