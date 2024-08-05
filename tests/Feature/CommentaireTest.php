<?php

namespace Tests\Feature;

use App\Models\Administrateur;
use App\Models\Profil;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentaireTest extends TestCase
{
    use RefreshDatabase;

    public function test_administrateur_peut_ajouter_un_commentaire()
    {
        $this->actingAs(Administrateur::factory()->create(), 'sanctum');

        $profil = Profil::factory()->create();

        $response = $this->postJson('/api/commentaires', [
            'profil_id' => $profil->id,
            'contenu' => 'Ceci est un commentaire de test.',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('commentaires', [
            'profil_id' => $profil->id,
            'contenu' => 'Ceci est un commentaire de test.',
        ]);
    }

    public function test_administrateur_ne_peut_pas_ajouter_plus_d_un_commentaire_sur_un_profil()
    {
        $administrateur = Administrateur::factory()->create();
        $this->actingAs($administrateur, 'sanctum');

        $profil = Profil::factory()->create();

        $this->postJson('/api/commentaires', [
            'profil_id' => $profil->id,
            'contenu' => 'Premier commentaire.',
        ]);

        $response = $this->postJson('/api/commentaires', [
            'profil_id' => $profil->id,
            'contenu' => 'Deuxième commentaire.',
        ]);

        $response->assertStatus(400);
    }
}
