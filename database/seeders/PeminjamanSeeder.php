<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('peminjamans')->insert([
            [
                'id_buku'          => 1001,
                'id_siswa'         => 2001,
                'id_petugas'       => 3001,
                'tanggal_peminjaman'  => now(),
                'tanggal_pengembalian' => now()->addDays(7),
                'status_peminjaman'  => 'Dipinjam',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'id_buku'          => 1002,
                'id_siswa'         => 2002,
                'id_petugas'       => 3002,
                'tanggal_peminjaman'  => now(),
                'tanggal_pengembalian' => now()->addDays(5),
                'status_peminjaman'  => 'Dipinjam',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}
