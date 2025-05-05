<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('petugas')->insert([
            [
                'id_petugas'       => 3001,
                'nama'             => 'Ahmad Zainuddin',
                'username'         => 'azainuddin',
                'password'         => bcrypt('password123'),
                'email'            => 'ahmad.zainuddin@library.com',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'id_petugas'       => 3002,
                'nama'             => 'Rina Oktaviani',
                'username'         => 'rinaoktaviani',
                'password'         => bcrypt('password456'),
                'email'            => 'rina.oktaviani@library.com',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}
