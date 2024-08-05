<?php

namespace Database\Factories;

use App\Models\Commentaire;
use App\Models\Profil;
use App\Models\Administrateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{

    protected $model = Commentaire::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contenu' => $this->faker->sentence(),
            'administrateur_id' => Administrateur::inRandomOrder()->first()->id,
            'profil_id' => Profil::inRandomOrder()->first()->id,
        ];
    }
}
