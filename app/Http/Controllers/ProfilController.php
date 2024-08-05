<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfilRequest;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::where('statut', 'actif')->get(['id', 'nom', 'prenom', 'image']);
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
