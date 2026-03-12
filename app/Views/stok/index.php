<!DOCTYPE html>
<html>

<head>

<title>Data Stok Produk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f5f6fa;">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">
<h4 class="mb-0">Data Stok Produk Jamu Aroma Rempah</h4>
</div>

<div class="card-body">

<table class="table table-striped table-hover text-center align-middle">

<thead class="table-dark">

<tr>
<th>No</th>
<th>Cabang</th>
<th>Nama Produk</th>
<th>Jumlah Stok</th>
<th>Status</th>
<th>Aksi</th>
</tr>

</thead>

<tbody>

<?php if(!empty($stok)): ?>

<?php $no=1; foreach($stok as $s): ?>

<tr>

<td><?= $no++ ?></td>

<td><?= $s['nama_cabang'] ?></td>

<td><?= $s['nama_produk'] ?></td>

<td>
<span class="badge bg-primary fs-6">
<?= $s['jumlah'] ?>
</span>
</td>

<td>

<?php 

if($s['jumlah'] == 0){

echo "<span class='badge bg-danger'>🔴 Habis</span>";

}
elseif($s['jumlah'] <= 10){

echo "<span class='badge bg-warning text-dark'>🟡 Hampir Habis</span>";

}
else{

echo "<span class='badge bg-success'>🟢 Tersedia</span>";

}

?>

</td>

<td>
<a href="/stok/edit/<?= $s['id_stok'] ?>" class="btn btn-warning btn-sm">
Edit Stok
</a>
</td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>
<td colspan="6">Data stok belum tersedia</td>
</tr>

<?php endif; ?>

</tbody>

</table>

<div class="mt-3">
<a href="/dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>

</div>

</div>

</div>

</body>
</html>