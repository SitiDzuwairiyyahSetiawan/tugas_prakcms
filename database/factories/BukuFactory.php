<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(3),
            'penulis' => $this->faker->name,
            'penerbit' => $this->faker->company,
            'tahun_terbit' => $this->faker->year,
            'isbn' => $this->faker->isbn13,
            'kategori_buku' => $this->faker->randomElement(['Fiksi', 'Nonfiksi']),
            'jumlah_stok' => $this->faker->numberBetween(1, 200),
        ];
    }
}
