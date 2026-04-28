<?php
require_once 'app/Config/Paths.php';
require_once 'system/bootstrap.php';

$db = \Config\Database::connect();
$query = $db->table('bahan_baku')->get();
$results = $query->getResultArray();

foreach($results as $row) {
    echo $row['nama_bahan'] . "\n";
}
