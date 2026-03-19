<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Pemesanan Bahan</h3>

<table class="table table-bordered table-striped">
<thead class="table-success">
<tr>
<th>No</th>
<th>Cabang</th>
<th>Bahan</th>
<th>Jumlah</th>
<th>Tanggal</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($pesanan as $p){ ?>

<tr>

<td><?= $no++ ?></td>
<td><?= $p['nama_cabang'] ?></td>
<td><?= $p['nama_bahan'] ?></td>
<td><?= $p['jumlah'] ?></td>
<td><?= $p['tanggal_pesan'] ?></td>

<td>
<?php 
$status = $p['status'] ?? 'menunggu'; // 🔥 ANTI KOSONG

if($status=='menunggu'){ ?>
    <span class="badge bg-warning">Menunggu</span>
<?php } elseif($status=='diproses'){ ?>
    <span class="badge bg-info">Diproses</span>
<?php } elseif($status=='dikirim'){ ?>
    <span class="badge bg-primary">Dikirim</span>
<?php } elseif($status=='selesai'){ ?>
    <span class="badge bg-success">Selesai</span>
<?php } elseif($status=='ditolak'){ ?>
    <span class="badge bg-danger">Ditolak</span>
<?php } ?>
</td>

<td>

<?php if($status == 'menunggu'){ ?>

<a href="<?= base_url('admin/pemesanan/proses/'.$p['id_pemesanan']) ?>" 
class="btn btn-info btn-sm">
Proses
</a>

<a href="<?= base_url('admin/pemesanan/tolak/'.$p['id_pemesanan']) ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Tolak pesanan?')">
Tolak
</a>

<?php } elseif($status == 'diproses'){ ?>

<a href="<?= base_url('admin/pemesanan/kirim/'.$p['id_pemesanan']) ?>" 
class="btn btn-primary btn-sm"
onclick="return confirm('Kirim bahan?')">
Kirim
</a>

<?php } elseif($status == 'dikirim'){ ?>

<a href="<?= base_url('admin/pemesanan/selesai/'.$p['id_pemesanan']) ?>" 
class="btn btn-success btn-sm">
Selesai
</a>

<?php } else { ?>

<span class="text-success">✔ Selesai</span>

<?php } ?>

</td>

</tr>

<?php } ?>

</tbody>
</table>

<?= $this->endSection() ?>