<?php

namespace Database\Factories;

use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Database\Eloquent\Factories\Factory;

class PreguntaFactory extends Factory
{

    public function definition(): array
    {
        return [
            'titulo' => $this->faker->realText(30)
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Pregunta $pregunta) {
            $respuestas = Respuesta::factory()->for($pregunta)->count(4)->create();
            $respuesta = $respuestas->random();
            $respuesta->correcta = true;
            $respuesta->save();
        });
    }
}