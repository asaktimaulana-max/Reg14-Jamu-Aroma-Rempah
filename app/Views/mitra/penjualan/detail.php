<?= $this->extend('mitra/layout/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-3">Detail Transaksi</h3>

<div class="card mb-3 shadow-sm">
    <div class="card-body">
        <p><b>Tanggal:</b> <?= $header['tanggal'] ?></p>
        <p><b>Total:</b> Rp <?= number_format($header['total'],0,',','.') ?></p>
    </div>
</div>

<div class="card shadow-sm">
<div class="card-body">

<table class="table table-bordered">
<tr>
    <th>Produk</th>
    <th>Qty</th>
    <th>Harga</th>
    <th>Subtotal</th>
</tr>

<?php foreach($detail as $d){ ?>

<tr>
    <td><?= $d['nama_produk'] ?></td>
    <td><?= $d['qty'] ?></td>
    <td>Rp <?= number_format($d['harga'],0,',','.') ?></td>
    <td>Rp <?= number_format($d['subtotal'],0,',','.') ?></td>
</tr>

<?php } ?>

</table>

</div>
</div>

<a href="<?= base_url('mitra/penjualan') ?>" class="btn btn-secondary mt-3">
Kembali
</a>

<?= $this->endSection() ?>