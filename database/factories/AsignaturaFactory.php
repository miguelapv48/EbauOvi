<?php

namespace Database\Factories;

use App\Models\Asignatura;
use App\Models\Examen;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignaturaFactory extends Factory
{
    private $asignaturas = [
        'Inglés',
        'Matemáticas',
        'Lengua'
    ];

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement($this->asignaturas)
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Asignatura $asignatura) {
            Examen::factory()->for($asignatura)->count(10)->create();
        });
    }
}