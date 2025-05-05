<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bukus')->insert([
            [
                'id_buku'           => '1001',
                'judul_buku'        => 'Pride and Prejudice',
                'penulis'           => 'Jane Austen',
                'penerbit'          => 'Penguin Classics',
                'tahun_terbit'      => 2005,
                'isbn'              => '9780141439518',
                'kategori_buku'     => 'Novel',
                'jumlah_buku_tersedia' => 10,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id_buku'           => '1002',
                'judul_buku'        => 'The Great Gatsby',
                'penulis'           => 'F. Scott Fitzgerald',
                'penerbit'          => 'Scribner',
                'tahun_terbit'      => 1925,
                'isbn'              => '9780743273565',
                'kategori_buku'     => 'Fiction',
                'jumlah_buku_tersedia' => 8,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'id_buku'           => '1003',
                'judul_buku'        => '1984',
                'penulis'           => 'George Orwell',
                'penerbit'          => 'Harvill Secker',
                'tahun_terbit'      => 1949,
                'isbn'              => '9780451524935',
                'kategori_buku'     => 'Dystopian',
                'jumlah_buku_tersedia' => 5,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
