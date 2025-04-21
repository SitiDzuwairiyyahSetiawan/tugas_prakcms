<?php

namespace App\Models;

class Peminjaman
{
    private static $data_peminjaman = [
        [
            'id' => 4001,
            'id_buku' => '1001',
            'id_siswa' => '2002',
            'id_petugas' => '3010',
            'tanggal_peminjaman' => '10-01-2024',
            'tanggal_pengembalian' => '15-01-2024',
            'status_peminjaman' => 'Dikembalikan',
        ],
        [
            'id' => 4002,
            'id_buku' => '1003',
            'id_siswa' => '2004',
            'id_petugas' => '3009',
            'tanggal_peminjaman' => '11-02-2024',
            'tanggal_pengembalian' => '20-02-2024',
            'status_peminjaman' => 'Terlambar Mengembalikan',
        ],
        [
            'id' => 4003,
            'id_buku' => '1019',
            'id_siswa' => '2020',
            'id_petugas' => '3006',
            'tanggal_peminjaman' => '19-10-2024',
            'tanggal_pengembalian' => '30-10-2024',
            'status_peminjaman' => 'Terlambat Mengembalikan',
        ],
    ];

    public static function all()
    {
        return collect(self::$data_peminjaman);
    }

    public static function find($id)
    {
        return collect(self::$data_peminjaman)->firstWhere('id', $id);
    }
}
