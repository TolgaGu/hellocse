<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfilRequest;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        //$profils = Profil::where('statut', 'actif')->with('commentaires')->get(['id', 'nom', 'prenom', 'image']);

        if (Auth::check()) {
            // Utilisateur authentifié
            $profils = Profil::with('commentaires')->get(['id', 'nom', 'prenom', 'image', 'statut']);
        } else {
            // Utilisateur non authentifié, afficher les statut 'actif' uniquement
            $profils = Profil::where('statut', 'actif')->with('commentaires')->get(['id', 'nom', 'prenom', 'image']);
        }

        return response()->json($profils);
    }

    public function update(UpdateProfilRequest $request, $id)
    {
        $profil = Profil::findOrFail($id);
        $profil->update($request->all());

        return response()->json($profil);
    }

    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();

        return response()->json(['message' => 'Profil supprimé avec succès.']);
    }
}
