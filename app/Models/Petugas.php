<?php

namespace App\Models;

class Petugas
{
    private static $data_petugas = [
        [
            'id' => 3001,
            'nama' => 'Rina Suryani',
            'username' => 'rina_suryani',
            'email' => 'rina.suryani@gmail.com',
            'password' => 'Rina12345!',
        ],
        [
            'id' => 3002,
            'nama' => 'Adi Putra',
            'username' => 'adi_putra',
            'email' => 'adi.putra@gmail.com',
            'password' => 'Adi12345!',
        ],
        [
            'id' => 3003,
            'nama' => 'Siti Rahmawati',
            'username' => 'siti_rahma',
            'email' => 'siti.rahma@gmail.com',
            'password' => 'Siti12345!',
        ],
    ];

    public static function all()
    {
        return collect(self::$data_petugas);
    }

    public static function find($id)
    {
        return collect(self::$data_petugas)->firstWhere('id', $id);
    }
}
