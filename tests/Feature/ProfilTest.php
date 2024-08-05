<?php

namespace Tests\Feature;

use App\Models\Administrateur;
use App\Models\Profil;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfilTest extends TestCase
{
    use RefreshDatabase;

    public function test_peut_recuperer_les_profils_actifs()
    {

        $this->actingAs(Administrateur::factory()->create(), 'sanctum');
        Profil::factory()->count(3)->create(['statut' => 'actif']);
        Profil::factory()->count(2)->create(['statut' => 'inactif']);

        $response = $this->getJson('/api/profils');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function test_administrateur_peut_modifier_un_profil()
    {
        $this->actingAs(Administrateur::factory()->create(), 'sanctum');

        $profil = Profil::factory()->create();

        $response = $this->putJson('/api/profils/'.$profil->id, [
            'nom' => 'Michel Michel',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('profils', [
            'id' => $profil->id,
            'nom' => 'Michel Michel',
        ]);
    }

    public function test_administrateur_peut_supprimer_un_profil()
    {
        $this->actingAs(Administrateur::factory()->create(), 'sanctum');

        $profil = Profil::factory()->create();

        $response = $this->deleteJson('/api/profils/'.$profil->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('profils', [
            'id' => $profil->id,
        ]);
    }
}
