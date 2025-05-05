<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('siswas')->insert([
            [
                'id_siswa'         => 2001,
                'nisn'             => '34982748',
                'nama'             => 'Lukman Hakim',
                'kelas'            => 'X IPA 1',
                'alamat'           => 'Jl. Kusumanegara No. 12, Yogyakarta',
                'nomor_telepon'    => '081356789012',
                'email'            => 'lukman.hakim@gmail.com',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'id_siswa'         => 2002,
                'nisn'             => '34982749',
                'nama'             => 'Andi Setiawan',
                'kelas'            => 'X IPA 2',
                'alamat'           => 'Jl. Suryodiningratan, Yogyakarta',
                'nomor_telepon'    => '082123456789',
                'email'            => 'andi.setiawan@gmail.com',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'id_siswa'         => 2003,
                'nisn'             => '34982750',
                'nama'             => 'Siti Nurhayati',
                'kelas'            => 'X IPA 3',
                'alamat'           => 'Jl. Gejayan No. 45, Yogyakarta',
                'nomor_telepon'    => '083254671234',
                'email'            => 'siti.nurhayati@gmail.com',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}
