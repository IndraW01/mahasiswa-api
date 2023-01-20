<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JurusanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Sistem Informasi', 'Informatika', 'Ilmu Komputer']),
            'slug' => fn (array $attributes) => Str::slug($attributes['name']),
            'kaprodi' => $this->faker->firstNameMale(),
            'kuota' => 100
        ];
    }
}
