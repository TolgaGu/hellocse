<?php

namespace Database\Factories;

use App\Models\Administrateur;
use App\Models\Profil;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profil>
 */
class ProfilFactory extends Factory
{
    protected $model = Profil::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'image' => $this->faker->imageUrl(),
            'statut' => $this->faker->randomElement(['inactif', 'en attente', 'actif']),
            'administrateur_id' => Administrateur::inRandomOrder()->first()->id,
        ];
    }
}
