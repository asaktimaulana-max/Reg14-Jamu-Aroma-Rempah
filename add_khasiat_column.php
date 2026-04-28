<?php
require_once 'app/Config/Paths.php';
require_once 'system/bootstrap.php';

$db = \Config\Database::connect();
$forge = \Config\Database::forge();

$fields = [
    'khasiat' => [
        'type' => 'TEXT',
        'null' => true
    ]
];

if (!$db->fieldExists('khasiat', 'bahan_baku')) {
    $forge->addColumn('bahan_baku', $fields);
    echo "Column 'khasiat' added successfully.\n";
} else {
    echo "Column 'khasiat' already exists.\n";
}
