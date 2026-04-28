<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BahanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_bahan' => 'Jahe',
                'khasiat'    => 'Menghangatkan tubuh, Meningkatkan daya tahan tubuh, Meredakan nyeri otot dan sendi, Menurunkan kolesterol dan gula darah, Melancarkan peredaran darah, Meredakan batuk dan pilek, Meningkatkan stamina',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Serai',
                'khasiat'    => 'Membantu meredakan perut kembung, Mengurangi rasa mual, Menurunkan tekanan darah, Membantu detoksifikasi tubuh, Meredakan nyeri sendi, Meningkatkan kualitas tidur',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Bunga Talang',
                'khasiat'    => 'Menjaga kesehatan mata, Meningkatkan daya tahan tubuh, Melancarkan peredaran darah, Menenangkan pikiran rileks, Menyegarkan tubuh, Mengandung antioksidan tinggi, Memberi warna alami',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Rosela',
                'khasiat'    => 'Menurunkan tekanan darah, Menurunkan kadar kolesterol, Meningkatkan daya tahan tubuh, Membantu menurunkan berat badan, Melancarkan pencernaan, Menangkal radikal bebas, Mengurangi peradangan',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Kunyit',
                'khasiat'    => 'Anti-inflamasi alami, Meningkatkan daya tahan tubuh, Menjaga kesehatan hati, Membantu pencernaan, Meredakan nyeri haid, Mencegah kerusakan sel akibat radikal bebas, Menjaga kesehatan kulit',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Kencur',
                'khasiat'    => 'Meningkatkan nafsu makan, Meredakan batuk dan pilek, Menghangatkan tubuh, Mengurangi pegal dan nyeri otot, Membantu pencernaan, Mengatasi masuk angin, Menambah energi tubuh',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Cengkeh',
                'khasiat'    => 'Meredakan sakit gigi, Menghangatkan tubuh, Mengatasi batuk dan pilek, Meningkatkan daya tahan tubuh, Membantu pencernaan, Mengurangi nyeri sendi dan otot, Menyegarkan napas',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Temulawak',
                'khasiat'    => 'Meningkatkan nafsu makan, Menjaga kesehatan hati, Membantu pencernaan, Mengurangi peradangan, Meningkatkan daya tahan tubuh, Mengatasi kelelahan, Membantu meredakan nyeri sendi',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Kayu Manis',
                'khasiat'    => 'Mengontrol gula darah, Meningkatkan daya tahan tubuh, Menghangatkan tubuh, Membantu pencernaan, Mengurangi peradangan, Menurunkan kolesterol, Memberi aroma dan rasa manis alami',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Biji Adas',
                'khasiat'    => 'Membantu pencernaan, Mengurangi perut kembung, Meredakan mual, Menyegarkan napas, Mengurangi nyeri haid, Meningkatkan nafsu makan, Membantu meredakan batuk',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Lengkuas',
                'khasiat'    => 'Menghangatkan tubuh, Membantu pencernaan, Meredakan nyeri otot dan sendi, Mengatasi mual, Meningkatkan daya tahan tubuh, Mengurangi peradangan, Mengatasi masuk angin',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Secang',
                'khasiat'    => 'Menghangatkan tubuh, Meningkatkan daya tahan tubuh, Melancarkan peredaran darah, Membantu pencernaan, Mengurangi peradangan, Menyegarkan tubuh, Memberi warna alami pada minuman',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Pala',
                'khasiat'    => 'Membantu pencernaan, Meningkatkan kualitas tidur, Meredakan batuk dan pilek, Mengurangi peradangan, Menghangatkan tubuh, Menyegarkan napas, Membantu meredakan nyeri',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
            [
                'nama_bahan' => 'Kapulaga',
                'khasiat'    => 'Membantu pencernaan, Mengurangi bau mulut, Meredakan batuk dan pilek, Mengurangi peradangan, Menyegarkan napas, Mengontrol tekanan darah, Meningkatkan daya tahan tubuh',
                'stok'       => 0,
                'satuan'     => 'kg'
            ],
        ];

        foreach ($data as $bahan) {
            // Check if exists
            $exists = $this->db->table('bahan_baku')
                ->where('nama_bahan', $bahan['nama_bahan'])
                ->get()
                ->getRow();

            if ($exists) {
                // Update khasiat
                $this->db->table('bahan_baku')
                    ->where('nama_bahan', $bahan['nama_bahan'])
                    ->update(['khasiat' => $bahan['khasiat']]);
            } else {
                // Insert new
                $this->db->table('bahan_baku')->insert($bahan);
            }
        }
    }
}
