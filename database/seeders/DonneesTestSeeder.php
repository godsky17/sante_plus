<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Utilisateur;
use App\Models\Patient;
use App\Models\Hopital;
use App\Models\Medecin;

class DonneesTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_FR');

        // ✅ Créer 10 patients avec leur utilisateur associé
        for ($i = 0; $i < 10; $i++) {
            $utilisateur = Utilisateur::create([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'email' => $faker->unique()->safeEmail,
                'mot_de_passe' => bcrypt('password'),
                'contact' => $faker->phoneNumber,
                'adresse' => $faker->address,
                'genre' => $faker->randomElement(['Homme', 'Femme']),
                'date_naissance' => $faker->date(),
                'type_utilisateur' => 'patient',
                'statut' => $faker->randomElement(['valider', 'rejeter', 'en attente']),
            ]);

            Patient::create([
                'id_utilisateur' => $utilisateur->_id,
                'groupe_sanguin' => $faker->randomElement(['A+', 'O-', 'B+', 'AB+']),
                'historique_medical' => $faker->sentence(10)
            ]);
        }

        // ✅ Créer 3 hôpitaux avec 3 médecins chacun
        for ($i = 0; $i < 3; $i++) {
            $hopital = Hopital::create([
                'nom' => 'Hôpital ' . $faker->company,
                'email' => $faker->unique()->companyEmail,
                'telephone' => $faker->phoneNumber,
                'adresse' => $faker->address,
                'description' => $faker->sentence(8),
                'statut_validation' => $faker->boolean
            ]);

            for ($j = 0; $j < 3; $j++) {
                $utilisateur = Utilisateur::create([
                    'nom' => $faker->lastName,
                    'prenom' => $faker->firstName,
                    'email' => $faker->unique()->safeEmail,
                    'mot_de_passe' => bcrypt('password'),
                    'contact' => $faker->phoneNumber,
                    'adresse' => $faker->address,
                    'genre' => $faker->randomElement(['Homme', 'Femme']),
                    'date_naissance' => $faker->date(),
                    'type_utilisateur' => 'medecin'
                ]);

                Medecin::create([
                    'id_utilisateur' => $utilisateur->_id,
                    'id_hopital' => $hopital->_id,
                    'specialite' => $faker->randomElement(['Cardiologue', 'Pédiatre', 'Gynécologue']),
                    'numero_ordre' => $faker->numerify('ORD###'),
                    'biographie' => $faker->paragraph(2),
                    'experience' => $faker->numberBetween(1, 25),
                    'disponibilite' => $faker->boolean
                ]);
            }
        }
    }
}
