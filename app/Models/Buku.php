<?php

namespace App\Models;

class Buku
{
    private static $data_buku = [
        [
            'id' => 1001,
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'penerbit' => 'Bentang Pustaka',
            'tahun_terbit' => '2005',
            'isbn' => '9789791227206',
            'kategori_buku' => 'Fiksi',
            'jumlah_stok' => '7',
        ],
        [
            'id' => 1002,
            'judul' => 'Bumi Manusia',
            'penulis' => 'Pramoedya Ananta Toer',
            'penerbit' => 'Lentera Dipantara',
            'tahun_terbit' => '1980',
            'isbn' => '9789799731223',
            'kategori_buku' => 'Fiksi',
            'jumlah_stok' => '5',
        ],
        [
            'id' => 1003,
            'judul' => 'Think and Grow Rich',
            'penulis' => 'Napoleon Hill',
            'penerbit' => 'Gramedia',
            'tahun_terbit' => '1937',
            'isbn' => '9786029246223',
            'kategori_buku' => 'Non-Fiksi',
            'jumlah_stok' => '10',
        ],
    ];

    public static function all()
    {
        return collect(self::$data_buku);
    }

    public static function find($id)
    {
        return collect(self::$data_buku)->firstWhere('id', $id);
    }
}
