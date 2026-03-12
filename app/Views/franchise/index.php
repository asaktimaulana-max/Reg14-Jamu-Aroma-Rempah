<!DOCTYPE html>
<html>

<head>

<title>Data Franchise</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3 class="mb-4">Data Franchise</h3>

<a href="/franchise/tambah" class="btn btn-success mb-3">
Tambah Franchise
</a>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>
<th>ID</th>
<th>Nama Cabang</th>
<th>Pemilik</th>
<th>Alamat</th>
<th>Kota</th>
<th>No HP</th>
<th>Status</th>
<th>Aksi</th>
</tr>

</thead>

<tbody>

<?php foreach($franchise as $f): ?>

<tr>

<td><?= $f['id_franchise'] ?></td>
<td><?= $f['nama_cabang'] ?></td>
<td><?= $f['pemilik'] ?></td>
<td><?= $f['alamat'] ?? '-' ?></td>
<td><?= $f['kota'] ?? '-' ?></td>
<td><?= $f['no_hp'] ?? '-' ?></td>

<td>

<?php if(($f['status'] ?? '') == 'Aktif'): ?>

<span class="badge bg-success">Aktif</span>

<?php else: ?>

<span class="badge bg-secondary">Nonaktif</span>

<?php endif; ?>

</td>

<td>

<a href="/franchise/edit/<?= $f['id_franchise'] ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="/franchise/hapus/<?= $f['id_franchise'] ?>" 
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

</div>

</div>

</body>

</html>