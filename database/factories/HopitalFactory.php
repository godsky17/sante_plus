<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hopital>
 */
class HopitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => 'Hôpital ' . $this->faker->company,
            'email' => $this->faker->companyEmail,
            'telephone' => $this->faker->phoneNumber,
            'adresse' => $this->faker->address,
            'description' => $this->faker->sentence(10),
            'statut_validation' => $this->faker->boolean
        ];
    }
}
