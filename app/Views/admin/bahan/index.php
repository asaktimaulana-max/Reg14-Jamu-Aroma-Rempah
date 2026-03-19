<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Data Bahan Baku</h3>

<div class="d-flex justify-content-between mb-3">

<a href="<?= base_url('admin/bahan/tambah') ?>" class="btn btn-primary">
<i class="bi bi-plus"></i> Tambah Bahan
</a>

<input type="text" id="search" class="form-control w-25" placeholder="Cari bahan...">

</div>

<table class="table table-bordered table-striped" id="tabelBahan">

<thead class="table-success">

<tr>
<th>No</th>
<th>Nama Bahan</th>
<th>Stok</th>
<th>Satuan</th>
<th width="150">Aksi</th>
</tr>

</thead>

<tbody>

<?php $no=1; foreach($bahan as $b){ ?>

<tr>

<td><?= $no++ ?></td>

<td><?= $b['nama_bahan'] ?></td>

<td><?= $b['stok'] ?></td>

<td><?= $b['satuan'] ?></td>

<td>

<a href="<?= base_url('admin/bahan/edit/'.$b['id_bahan']) ?>" 
class="btn btn-warning btn-sm">

<i class="bi bi-pencil"></i>

</a>

<a href="<?= base_url('admin/bahan/hapus/'.$b['id_bahan']) ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus bahan ini?')">

<i class="bi bi-trash"></i>

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<script>

document.getElementById("search").addEventListener("keyup", function() {

let value = this.value.toLowerCase();

let rows = document.querySelectorAll("#tabelBahan tbody tr");

rows.forEach(row => {

row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";

});

});

</script>

<?= $this->endSection() ?>