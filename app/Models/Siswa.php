<?php

namespace App\Models;

class Siswa
{
    private static $data_siswa = [
        [
            'id' => 2001,
            'nisn' => '34982748',
            'nama' => 'Lukman Hakim',
            'kelas' => 'X IPA 1',
            'alamat' => 'Jl. Kusumanegara No. 12, Yogyakarta',
            'nomor_telepon' => '081356789012',
            'email' => 'lukman.hakim@gmail.com',
        ],
        [
            'id' => 2002,
            'nisn' => '34982749',
            'nama' => 'Dewi Lestari',
            'kelas' => 'X IPA 2',
            'alamat' => 'Jl. Malioboro No.45, Yogyakarta',
            'nomor_telepon' => '081267890123',
            'email' => 'dewi.lestari@gmail.com',
        ],
        [
            'id' => 2003,
            'nisn' => '34982757',
            'nama' => 'Bayu Wicaksono',
            'kelas' => 'XI IPS 1',
            'alamat' => 'Jl. Monjali No. 15, Sleman',
            'nomor_telepon' => '081104567890',
            'email' => 'bayu.wicaksono@gmail.com',
        ],
    ];

    public static function all()
    {
        return collect(self::$data_siswa);
    }

    public static function find($id)
    {
        return collect(self::$data_siswa)->firstWhere('id', $id);
    }
}
