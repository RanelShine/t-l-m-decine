<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Utilisation de la factory de User pour associer un utilisateur aléatoire
            'user_id' => User::factory(), // Cette ligne crée un utilisateur aléatoire associé au patient

            // Données aléatoires pour la date de naissance du patient
            'Date_de_Naissance' => $this->faker->date(),
        ];
    }
}
