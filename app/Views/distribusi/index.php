<!DOCTYPE html>
<html>
<head>

<title>Distribusi Stok</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Distribusi Stok ke Cabang</h3>

<a href="/distribusi/tambah" class="btn btn-success mb-3">
Tambah Distribusi
</a>

<table class="table table-bordered">

<thead>

<tr>
<th>No</th>
<th>Produk</th>
<th>Cabang</th>
<th>Jumlah</th>
</tr>

</thead>

<tbody>

<?php $no=1; foreach($distribusi as $d): ?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nama_produk'] ?></td>

<td><?= $d['nama_cabang'] ?></td>

<td><?= $d['jumlah'] ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</body>
</html>