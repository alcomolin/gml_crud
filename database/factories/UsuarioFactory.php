<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'apellidos' => $this->faker->lastName,
            'cedula' => $this->faker->randomNumber(5, true),
            'email' => $this->faker->unique()->safeEmail,
            'pais' => $this->faker->country,
            'direccion' => $this->faker->address,
            'celular' => $this->faker->randomNumber(5, true),
            'categoria' => $this->faker->numberBetween(1, 3),
        ];
    }
}
