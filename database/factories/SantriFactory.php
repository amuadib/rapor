<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SantriFactory extends Factory
{
    public function definition(): array
    {
        $genders = ['l' => 'male', 'p' => 'female'];
        $gender_selected = rand(1, 10) % 2 == 0 ? 'l' : 'p';
        return  [
            'nis' => str_pad(rand(200, 9999), 4, '0', STR_PAD_LEFT),
            'nama' => fake()->name($genders[$gender_selected]),
            'alamat' => fake()->address,
            'jenis_kelamin' => $gender_selected,
        ];
    }
}
