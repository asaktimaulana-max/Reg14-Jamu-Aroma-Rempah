<?= $this->extend('mitra/layout/template') ?>
<?= $this->section('content') ?>

<h3>Pesan Bahan</h3>

<div class="card">
<div class="card-body">

<form action="<?= base_url('mitra/pemesanan/simpan') ?>" method="post">

<div class="mb-3">
<label>Bahan</label>
<select name="id_bahan" id="id_bahan" class="form-control" onchange="updateKhasiat()">
<option value="">-- Pilih Bahan --</option>
<?php foreach($bahan as $b){ ?>
<option value="<?= $b['id_bahan'] ?>" data-khasiat="<?= esc($b['khasiat']) ?>">
    <?= $b['nama_bahan'] ?> (Stok: <?= $b['stok'] ?> <?= $b['satuan'] ?>)
</option>
<?php } ?>
</select>
</div>

<div class="mb-3">
<label>Khasiat Bahan</label>
<div id="khasiat_bahan" class="form-control bg-light" style="min-height: 60px; height: auto;">-</div>
</div>

<script>
function updateKhasiat() {
    var select = document.getElementById('id_bahan');
    var option = select.options[select.selectedIndex];
    var khasiat = option.getAttribute('data-khasiat');
    document.getElementById('khasiat_bahan').innerText = khasiat ? khasiat : '-';
}
</script>

<div class="mb-3">
<label>Jumlah</label>
<input type="number" name="jumlah" class="form-control" required>
</div>

<button class="btn btn-success">Kirim Pesanan</button>

</form>

</div>
</div>

<?= $this->endSection() ?>