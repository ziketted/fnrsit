<?php

namespace App\Http\Controllers;

use App\Models\PrincipaleDepense;
use App\Http\Requests\StorePrincipaleDepenseRequest;
use App\Http\Requests\UpdatePrincipaleDepenseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrincipaleDepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'projet_id' => 'required|exists:projets,id',
            'partie' => 'required|string|max:255',
            'libelle' => 'required|string|max:255',
            'cout' => 'required|numeric',
            'duree' => 'required|string|max:50',
        ]);

        // Créer une nouvelle PrincipaleDepense
        PrincipaleDepense::create([
            'user_id' => Auth::id(),  // ID de l'utilisateur connecté
            'projet_id' => $validatedData['projet_id'],
            'partie' => $validatedData['partie'],
            'libelle' => $validatedData['libelle'],
            'cout' => $validatedData['cout'],
            'duree' => $validatedData['duree'],
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('projet.show', $validatedData['projet_id'])
                         ->with('success', 'Dépense ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(PrincipaleDepense $principaleDepense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrincipaleDepense $principaleDepense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrincipaleDepenseRequest $request, PrincipaleDepense $principaleDepense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrincipaleDepense $principaleDepense)
    {
        //
    }
}
