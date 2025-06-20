<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_utilisateur' => null, // sera lié dynamiquement
            'groupe_sanguin' => $this->faker->randomElement(['A+', 'B+', 'O-', 'AB+']),
            'historique_medical' => $this->faker->sentence(8)
        ];
    }
}
