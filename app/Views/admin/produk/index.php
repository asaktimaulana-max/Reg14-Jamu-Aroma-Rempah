<!DOCTYPE html>
<html>

<head>

<title>Data Produk Jamu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3 class="mb-4">Data Produk Jamu</h3>

<a href="/admin/produk/tambah" class="btn btn-success mb-3">
Tambah Produk
</a>

<table class="table table-bordered table-striped">

<thead class="table-success">

<tr>

<th>ID</th>
<th>Nama Produk</th>
<th>Harga</th>
<th>Foto</th>
<th>Khasiat</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php foreach($produk as $p): ?>

<tr>

<td><?= $p['id_produk'] ?></td>
<td><?= $p['nama_produk'] ?></td>
<td>Rp <?= number_format($p['harga']) ?></td>

<td>
<?php if($p['foto']) : ?>
<img src="/uploads/<?= $p['foto'] ?>" width="80">
<?php endif; ?>
</td>

<td><?= $p['khasiat'] ?></td>

<td>

<a href="/admin/produk/edit/<?= $p['id_produk'] ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="/admin/produk/hapus/<?= $p['id_produk'] ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus data?')">
Hapus
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</body>
</html>