<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nisn' => $this->faker->unique()->numerify('##########'), // 10 digit NISN
            'nama' => $this->faker->name,
            'kelas' => $this->faker->randomElement(['X', 'XI', 'XII']), // umumkan saja tanpa detail jurusan
            'alamat' => $this->faker->address,
            'nomor_telepon' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
