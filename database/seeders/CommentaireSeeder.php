<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commentaire;

class CommentaireSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Commentaire::factory()->count(3)->create();
    }
}
