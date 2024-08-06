<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentaire[] $commentaires
 */
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

    /**
     * Get the comments for the profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
