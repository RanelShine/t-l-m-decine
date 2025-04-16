<?php

namespace Database\Factories;

use App\Models\Medecin;
use App\Models\User;
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
            // Création d'un utilisateur aléatoire associé au médecin
            'user_id' => User::factory(),
            
            // Attribuer aléatoirement une spécialité parmi quelques exemples
            'specialite' => $this->faker->randomElement([
                'Cardiologie',
                'Dermatologie',
                'Neurologie',
                'Pédiatrie',
                'Chirurgie',
                'Gynécologie',
                'Ophtalmologie',
                'généraliste'
            ]),
        ];
    }
}
