<!DOCTYPE html>
<html>

<head>

<title>Edit Stok</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">
<h4>Edit Stok Produk</h4>
</div>

<div class="card-body">

<form action="/stok/update" method="post">

<input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">

<div class="mb-3">
<label>Nama Produk</label>
<input type="text" class="form-control" value="<?= $produk['nama_produk'] ?>" readonly>
</div>

<div class="mb-3">
<label>Stok</label>
<input type="number" name="stok" class="form-control" value="<?= $produk['stok'] ?>">
</div>

<button class="btn btn-success">Simpan</button>
<a href="/stok" class="btn btn-secondary">Kembali</a>

</form>

</div>

</div>

</div>

</body>
</html>