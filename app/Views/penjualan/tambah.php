<!DOCTYPE html>
<html>
<head>

<title>Input Penjualan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Input Penjualan</h3>

<?php if(session()->getFlashdata('error')): ?>
<div class="alert alert-danger">
<?= session()->getFlashdata('error') ?>
</div>
<?php endif; ?>

<form action="/penjualan/simpan" method="post">

<?= csrf_field(); ?>

<div class="mb-3">

<label class="form-label">Produk</label>

<select name="id_produk" class="form-control" required>

<option value="">-- Pilih Produk --</option>

<?php foreach($produk as $p): ?>

<option value="<?= $p['id_produk']; ?>">
<?= $p['nama_produk']; ?> - Rp <?= number_format($p['harga'],0,',','.'); ?>
</option>

<?php endforeach; ?>

</select>

</div>


<div class="mb-3">

<label class="form-label">Jumlah</label>

<input type="number" name="jumlah" class="form-control" required>

</div>


<div class="mb-3">

<label class="form-label">Tanggal</label>

<input type="date" name="tanggal" class="form-control" required>

</div>


<button type="submit" class="btn btn-success">
Simpan
</button>

<a href="/mitra" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>