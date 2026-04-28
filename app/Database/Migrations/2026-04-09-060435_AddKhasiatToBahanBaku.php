<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKhasiatToBahanBaku extends Migration
{
    public function up()
    {
        $this->forge->addColumn('bahan_baku', [
            'khasiat' => [
                'type' => 'TEXT',
                'null' => true
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('bahan_baku', 'khasiat');
    }
}
