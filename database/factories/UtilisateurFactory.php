<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilisateur>
 */
class UtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'mot_de_passe' => bcrypt('password'),
            'contact' => $this->faker->phoneNumber,
            'adresse' => $this->faker->address,
            'genre' => $this->faker->randomElement(['Homme', 'Femme']),
            'date_naissance' => $this->faker->date,
            'type_utilisateur' => 'patient' // ou 'medecin' selon le cas
        ];
    }
}
