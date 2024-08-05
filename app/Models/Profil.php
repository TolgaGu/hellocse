<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'image',
        'statut',
        'administrateur_id',
    ];

    public function administrateur()
    {
        return $this->belongsTo(Administrateur::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
