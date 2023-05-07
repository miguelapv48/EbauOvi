<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{

    public function definition(): array
    {
        return [
            'titulo' => $this->faker->realText(50),
            'descripcion' => $this->faker->realText(),
            'user_id' => 1
        ];
    }
}
