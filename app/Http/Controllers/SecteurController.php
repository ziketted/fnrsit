<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecteurController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $secteurs = Secteur::all(); // Vous pouvez utiliser paginate() pour paginer les résultats

        // Retourner la vue avec les secteurs
        return view('secteur.index', compact('secteurs'));
    }

    public function create()
    {
        return view('secteur.create');  // Assurez-vous que la vue 'secteur.create' existe
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
      $request->validate([
            'libelle' => 'required|string|max:255|unique:secteurs,libelle',
            'description' => 'nullable|string',
        ], [
            'libelle.unique' => 'Le libellé doit être unique. Ce libellé existe déjà.',
        ]);

        // Enregistrement des données dans la base de données
        Secteur::create([
            'user_id' => Auth::id(), // Si vous utilisez l'authentification
            'libelle' => $request->libelle,
            'description' => $request->description,
        ]);

        // Redirection avec un message de succès
        return redirect()->route('secteur.index')->with('success', 'Secteur ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Secteur $secteur)
    {

        return view('secteur.show', compact('secteur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Secteur $secteur)
    {
        return view('secteur.edit', compact('secteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Secteur $secteur)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $secteur->update([
            'libelle' => $request->libelle,
            'description' => $request->description,
        ]);

        return redirect()->route('secteur.edit', $secteur)->with('success', 'Secteur mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Secteur $secteur)
    {
        $secteur->delete();
        return redirect()->route('secteur.index')->with('success', 'Secteur supprimé avec succès');
    }
}
