<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DendaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dendas')->insert([
            [
                'id_peminjaman'      => 4001,
                'jumlah_denda_perhari' => 5000,
                'total_denda'        => 35000,
                'status_pembayaran'  => 'Belum Dibayar',
                'tanggal_pembayaran' => 20-10-2024,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
            [
                'id_peminjaman'      => 4002,
                'jumlah_denda_perhari' => 5000,
                'total_denda'        => 25000,
                'status_pembayaran'  => 'Belum Dibayar',
                'tanggal_pembayaran' => 04-12-2024,
                'created_at'         => now(),
                'updated_at'         => now(),
            ],
        ]);
    }
}

