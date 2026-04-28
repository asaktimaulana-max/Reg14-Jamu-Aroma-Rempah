<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Image 1: HOT
            [
                'nama_produk' => 'WEDANG REMPAH (Rempah Super)',
                'harga'       => 10000,
                'khasiat'     => 'Meningkatkan daya tahan tubuh, Mengontrol gula darah & kolesterol, Menjaga kesehatan jantung & peredaran darah, Pegal-pegal & masuk angin, Melancarkan pencernaan, Flu & batuk',
                'foto'        => null
            ],
            [
                'nama_produk' => 'SUSU JAHE REMPAH (Jahe, Rempah KCB, susu)',
                'harga'       => 10000,
                'khasiat'     => 'Meningkatkan daya tahan tubuh, Menambah energi & stamina, Efek Relaksasi, Baik untuk pencernaan',
                'foto'        => null
            ],
            [
                'nama_produk' => 'WEDANG TEMULAWAK (Temulawak, KCB, Serai)',
                'harga'       => 10000,
                'khasiat'     => 'Menjaga kesehatan hati, Meningkatkan nafsu makan, Melancarkan pencernaan, Meningkatkan stamina & imun tubuh, Meredakan peradangan & pegal-pegal, Kolesterol & metabolisme',
                'foto'        => null
            ],
            [
                'nama_produk' => 'WEDANG KENCUR (Kencur, Jahe, KCB, serai)',
                'harga'       => 10000,
                'khasiat'     => 'Meredakan Flu, batuk & tenggorokan gatal, Masuk angin & menghangatkan tubuh, Meningkatkan daya tahan tubuh, Mengurangi stres & membuat rileks, Menambah energi & kesegaran, Gigi, gusi, menyegarkan mulut, Nyeri radang, mengontrol gula darah',
                'foto'        => null
            ],
            [
                'nama_produk' => 'STMJ (Susu, Telur, Madu, Jahe)',
                'harga'       => 15000,
                'khasiat'     => 'Meningkatkan stamina & energi, Menjaga kesehatan otot & tulang, Meningkatkan daya tahan tubuh, Membantu pemulihan tubuh, Melancarkan peredaran darah, Baik untuk kesuburan (pria & wanita)',
                'foto'        => null
            ],
            [
                'nama_produk' => 'WEDANG UWUH (Jahe, KCB, kayu manis, serai, secang)',
                'harga'       => 10000,
                'khasiat'     => 'Menghangatkan tubuh, Melancarkan peredaran darah, Meningkatkan daya tahan tubuh, Meredakan masuk angin, flu, dan batuk, Mengurangi kolesterol & gula darah, Anti-inflamasi & analgesik alami, Menenangkan tubuh',
                'foto'        => null
            ],
            [
                'nama_produk' => 'WEDANG KUNYIT (kunyit, Jahe, KCB, kayu manis, serai)',
                'harga'       => 10000,
                'khasiat'     => 'Anti-inflamasi & detoks tubuh, Melancarkan pencernaan & menjaga kesehatan jantung, Meredakan batuk & sakit tenggorokan, Meningkatkan imun & meredakan flu, Menghangatkan tubuh & melancarkan peredaran darah, Menurunkan tekanan darah & meredakan stres, Mengontrol gula darah & kolesterol, Melancarkan sirkulasi darah & menyehatkan jantung',
                'foto'        => null
            ],
            [
                'nama_produk' => 'WEDANG LENGKUAS (Lengkuas, Jahe, KCB, kayu manis, serai)',
                'harga'       => 10000,
                'khasiat'     => 'Melancarkan pencernaan & antibakteri, Meredakan batuk & tingkatkan imun, Melancarkan peredaran darah & sehatkan jantung, Hangatkan tubuh & redakan masuk angin, Turunkan tekanan darah & bantu detoks',
                'foto'        => null
            ],
            // Image 2: ICE
            [
                'nama_produk' => 'JAHE BOOSTER (Jahe, Lemon, serai)',
                'harga'       => 10000,
                'khasiat'     => 'Menyegarkan tubuh & melepas dahaga, Meningkatkan imun & kaya vitamin C, Meredakan flu, batuk & sakit tenggorokan, Membantu detoksifikasi tubuh, Menurunkan stres & menjaga mood tetap segar',
                'foto'        => null
            ],
            [
                'nama_produk' => 'KENCUR BOOSTER (Kencur, Lemon, serai)',
                'harga'       => 10000,
                'khasiat'     => 'Menyegarkan tubuh & melepas dahaga, Meningkatkan imun & kaya vitamin C, Meredakan perut kembung & melancarkan pencernaan, Membantu detoksifikasi tubuh, Menurunkan stres & menjaga mood tetap segar',
                'foto'        => null
            ],
            [
                'nama_produk' => 'KUNYIT BOOSTER (Kunyit, Lemon, serai)',
                'harga'       => 10000,
                'khasiat'     => 'Menyegarkan tubuh & melepas dahaga, Anti-inflamasi alami & baik untuk sendi, Meningkatkan imun & kaya vitamin C, Membantu detoksifikasi tubuh, Menurunkan stres & membuat tubuh lebih rileks',
                'foto'        => null
            ],
            [
                'nama_produk' => 'KUNJARUK (Kunyit, Jahe, Jeruk)',
                'harga'       => 10000,
                'khasiat'     => 'Meningkatkan Imun Tubuh, Mengurangi rasa lelah & stres, Melancarkan pencernaan & menjaga lambung, Detox alami',
                'foto'        => null
            ],
            [
                'nama_produk' => 'JANCRUK (Jahe, Kencur, Jeruk)',
                'harga'       => 10000,
                'khasiat'     => 'Meningkatkan Imun Tubuh, Mengurangi rasa lelah & pegal, Melancarkan pencernaan & meredakan kembung, Detox alami',
                'foto'        => null
            ],
            [
                'nama_produk' => 'TEH BUNGA TELANG',
                'harga'       => 10000,
                'khasiat'     => 'Baik untuk Imun & melawan Radikal bebas, Kesehatan mata, Menjaga Sirkulasi darah & kesehatan jantung, Baik untuk kulit, rambut & kesehatan otak, Menurunkan tekanan darah tinggi, Bersifat deuretik (melancarkan buang air kecil)',
                'foto'        => null
            ],
            [
                'nama_produk' => 'TEH BUNGA ROSELA',
                'harga'       => 10000,
                'khasiat'     => 'Baik untuk Imun & melawan Radikal bebas, Kesehatan mata, Menjaga Sirkulasi darah & kesehatan jantung, Baik untuk kulit, rambut & kesehatan otak, Menurunkan tekanan darah tinggi, Bersifat deuretik (melancarkan buang air kecil)',
                'foto'        => null
            ],
        ];

        // Using Query Builder
        $this->db->table('produk_jamu')->insertBatch($data);
    }
}
