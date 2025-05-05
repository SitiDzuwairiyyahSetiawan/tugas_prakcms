<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Denda>
 */
class DendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jumlahPerHari = $this->faker->randomElement([500]);
        $jumlahHari = $this->faker->numberBetween(1, 30);
        
        return [
            'id_peminjaman' => $this->faker->numberBetween(5001),
            'jumlah_denda_perhari' => $jumlahPerHari,
            'total_denda' => $jumlahPerHari * $jumlahHari,
            'status_pembayaran' => $this->faker->randomElement(['Lunas', 'Belum Lunas']),
            'tanggal_pembayaran' => $this->faker->date('Y-m-d'),
        ];
    }
}
