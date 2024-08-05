<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentaireRequest;
use App\Models\Commentaire;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function store(StoreCommentaireRequest $request)
    {
        $administrateur = Auth::user();
        $profil = Profil::findOrFail($request->profil_id);

        if ($profil->commentaires()->where('administrateur_id', $administrateur->id)->exists()) {
            return response()->json(['message' => 'Vous avez déjà commenté ce profil.'], 400);
        }

        $commentaire = new Commentaire;
        $commentaire->contenu = $request->contenu;
        $commentaire->profil_id = $profil->id;
        $commentaire->administrateur_id = $administrateur->id;
        $commentaire->save();

        return response()->json($commentaire, 201);
    }
}
