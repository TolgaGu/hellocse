<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'administrateur_id',
        'profil_id',
    ];

    public function administrateur()
    {
        return $this->belongsTo(Administrateur::class);
    }

    public function profil()
    {
        return $this->belongsTo(Profil::class);
    }
}
