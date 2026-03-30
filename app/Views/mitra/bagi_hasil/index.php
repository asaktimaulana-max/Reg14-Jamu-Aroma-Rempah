<?= $this->extend('mitra/layout/template') ?>
<?= $this->section('content') ?>

<h3>Bagi Hasil</h3>

<?php if(session()->getFlashdata('success')){ ?>
<div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
</div>
<?php } ?>

<?php if(session()->getFlashdata('error')){ ?>
<div class="alert alert-danger">
    <?= session()->getFlashdata('error') ?>
</div>
<?php } ?>

<a href="<?= base_url('mitra/bagi_hasil/generate') ?>" 
class="btn btn-success mb-3">
Generate Bagi Hasil Bulan Ini
</a>

<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
<th>No</th>
<th>Periode</th>
<th>Total Omzet</th>
<th>Bagian Mitra (80%)</th>
<th>Bagian Pusat (20%)</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($bagi_hasil as $b){ ?>

<tr>
<td><?= $no++ ?></td>
<td><?= $b['periode'] ?></td>
<td>Rp <?= number_format($b['total_omset'],0,',','.') ?></td>
<td>Rp <?= number_format($b['bagian_mitra'],0,',','.') ?></td>
<td>Rp <?= number_format($b['bagi_hasil_pusat'],0,',','.') ?></td>
</tr>

<?php } ?>

</tbody>
</table>

<?= $this->endSection() ?>