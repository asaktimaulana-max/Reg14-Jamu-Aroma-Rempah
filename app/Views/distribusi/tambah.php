<!DOCTYPE html>
<html>
<head>

<title>Tambah Distribusi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h3>Kirim Stok ke Cabang</h3>

<form action="/distribusi/simpan" method="post">

<div class="mb-3">

<label>Produk</label>

<select name="id_produk" class="form-control">

<?php foreach($produk as $p): ?>

<option value="<?= $p['id_produk'] ?>">
<?= $p['nama_produk'] ?>
</option>

<?php endforeach; ?>

</select>

</div>


<div class="mb-3">

<label>Cabang</label>

<select name="id_franchise" class="form-control">

<?php foreach($franchise as $f): ?>

<option value="<?= $f['id_franchise'] ?>">
<?= $f['nama_cabang'] ?>
</option>

<?php endforeach; ?>

</select>

</div>


<div class="mb-3">

<label>Jumlah</label>

<input type="number" name="jumlah" class="form-control">

</div>


<button class="btn btn-success">
Kirim Stok
</button>

<a href="/distribusi" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>