<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tanggal_pinjam = $this->faker->dateTimeBetween('-1 month', 'now');
        $tanggal_kembali = (clone $tanggal_pinjam)->modify('+10 days');

        return [
            'id_buku' => $this->faker->numberBetween(1001),
            'id_siswa' => $this->faker->numberBetween(2001),
            'id_petugas' => $this->faker->numberBetween(3001),
            'tanggal_peminjaman' => $tanggal_pinjam->format('Y-m-d'),
            'tanggal_pengembalian' => $tanggal_kembali->format('Y-m-d'),
            'status_peminjaman' => $this->faker->randomElement(['Dipinjam', 'Dikembalikan', 'Terlambat Mengembalikan']),
        ];
    }
}
