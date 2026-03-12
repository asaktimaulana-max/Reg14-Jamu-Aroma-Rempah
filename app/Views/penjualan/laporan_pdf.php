<h2>Laporan Penjualan Jamu Aroma</h2>

<table border="1" width="100%" cellpadding="5">

<tr>

<th>ID</th>
<th>Tanggal</th>
<th>Jumlah</th>
<th>Total</th>

</tr>

<?php foreach($penjualan as $p): ?>

<tr>

<td><?= $p['id_penjualan'] ?></td>
<td><?= $p['tanggal'] ?></td>
<td><?= $p['jumlah'] ?></td>
<td><?= $p['total'] ?></td>

</tr>

<?php endforeach; ?>

</table>