<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medecin>
 */
class MedecinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'id_utilisateur' => null,
            'specialite' => $this->faker->randomElement(['Cardiologie', 'Pédiatrie', 'Neurologie']),
            'numero_ordre' => $this->faker->unique()->numerify('ORD###'),
            'biographie' => $this->faker->paragraph,
            'experience' => $this->faker->numberBetween(1, 20),
            'disponibilite' => $this->faker->boolean,
            'id_hopital' => null
        ];
    }
}
