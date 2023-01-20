<?php

namespace Database\Factories;

use App\Enum\JenisKelaminEnum;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::query()->get()->pluck('id')->toArray();
        $jurusan = Jurusan::query()->get()->pluck('id')->toArray();

        return [
            'user_id' => $this->faker->unique()->randomElement($user),
            'jurusan_id' => $this->faker->randomElement($jurusan),
            'nim' => $this->faker->unique()->numerify('19########'),
            'jenis_kelamin' => $this->faker->randomElement([JenisKelaminEnum::LAKI->value, JenisKelaminEnum::PEREMPUAN->value]),
            'foto' => 'avatar.jpg'
        ];
    }
}
