<?php

namespace App\Models;

class Denda
{
    private static $data_denda = [
        [
            'id' => 5001,
            'id_peminjaman' => '4002',
            'jumlah_denda_perhari' => '500',
            'total_denda' => '5000',
            'status_pembayaran' => 'Lunas',
            'tanggal_pembayaran' => '24-02-2004',
        ],
        [
            'id' => 5002,
            'id_peminjaman' => '4002',
            'jumlah_denda_perhari' => '500',
            'total_denda' => '7500',
            'status_pembayaran' => 'Lunas',
            'tanggal_pembayaran' => '30-04-2024',
        ],
        [
            'id' => 5003,
            'id_peminjaman' => '4023',
            'jumlah_denda_perhari' => '500',
            'total_denda' => '7500',
            'status_pembayaran' => 'Lunas',
            'tanggal_pembayaran' => '12-12-2024',
        ],
    ];

    public static function all()
    {
        return collect(self::$data_denda);
    }

    public static function find($id)
    {
        return collect(self::$data_denda)->firstWhere('id', $id);
    }
}
