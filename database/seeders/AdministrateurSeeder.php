<?php

namespace Database\Seeders;

use App\Models\Administrateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdministrateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Administrateur::create([
            'name' => 'Michel Michel',
            'email' => 'test@admin.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // mdp par défaut
            'remember_token' => Str::random(10),
        ]);
        Administrateur::factory()->count(2)->create();
    }
}
