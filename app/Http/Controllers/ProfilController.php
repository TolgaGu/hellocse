<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfilRequest;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {

        return response()->json(Auth::user());
        // Vérifier si l'utilisateur est authentifié
        /* if (Auth::check())
            $profils = Profil::where('statut', 'actif')->with('commentaires')->get(['id', 'nom', 'prenom', 'image','statut']);
        else
            $profils = Profil::where('statut', 'actif')->with('commentaires')->get(['id', 'nom', 'prenom', 'image']);
*/
        $profils = Profil::where('statut', 'actif')->with('commentaires')->get(['id', 'nom', 'prenom', 'image']);
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
