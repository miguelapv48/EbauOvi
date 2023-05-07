<?php

namespace Database\Factories;

use App\Models\Examen;
use App\Models\Pregunta;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamenFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->catchPhrase()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Examen $examen) {
            Pregunta::factory()->for($examen)->count(10)->create();
        });
    }
}
