<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Http\Requests\StoreProjetRequest;
use App\Http\Requests\UpdateProjetRequest;
use App\Models\Entrepreneur;
use App\Models\PrincipaleDepense;
use App\Models\Secteur;
use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projets = Projet::with(['entrepreneur', 'secteur'])->paginate(3);

        // Passer les projets à la vue
        return view('projet.index', compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $secteurs= Secteur::all();
        $entrepreneurs= Entrepreneur::all();

        return view('projet.create',['secteurs'=>$secteurs, 'entrepreneurs'=>$entrepreneurs] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjetRequest $request)
    {

        Projet::create([
            'titre' => $request->titre,
            'budget' => $request->budget,
            'debut' => $request->debut,
            'fin' => $request->fin,
            'secteur_id' => $request->secteur_id,
            'entrepreneur_id' => $request->entrepreneur_id,
            'user_id' => Auth::id(), // Assignation de l'utilisateur connecté
        ]);

        return redirect()->route('projet.index')->with('success', 'Projet créé avec succès!');

    }

    /**
     * Display the specified resource.
     */
    public function show($projet)
    {
        //
        $pj=Projet::where('id', $projet)->first();

        $depenses = PrincipaleDepense::where('projet_id', $projet)
        ->whereIn('partie', ['Actifs immobilisés', 'Actifs circulants', 'Trésorerie', 'Provision pour imprévus'])
        ->orderBy('partie')
        ->get();
        return view('projet.show', ['projet'=>$pj,  'depenses'=>$depenses]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjetRequest $request, Projet $projet)
    {
        //
         // Met à jour les informations du projet
        $projet->update([
            'titre' => $request->titre,
            'proprietaire' => $request->proprietaire,
            'budget' => $request->budget,
            'debut' => $request->debut,
            'fin' => $request->fin,
            'secteur_id' => $request->secteur_id,
            'entrepreneur_id' => $request->entrepreneur_id,
            'user_id' => Auth::id(), // Mis à jour avec l'utilisateur connecté
        ]);

        return redirect()->route('projet.index')->with('success', 'Projet mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {
        // Suppression avec SoftDeletes
        $projet->delete();

        return redirect()->route('projet.index')->with('success', 'Projet supprimé avec succès!');
    }

}
