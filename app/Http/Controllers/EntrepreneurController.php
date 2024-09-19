<?php

namespace App\Http\Controllers;

use App\Models\Entrepreneur;
use App\Http\Requests\StoreEntrepreneurRequest;
use App\Http\Requests\UpdateEntrepreneurRequest;

class EntrepreneurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entrepreneur = Entrepreneur::all();
        return view('entrepreneur.index', compact('entrepreneur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entrepreneur.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntrepreneurRequest $request)
    {
        $validated = $request->validated(); // Validation automatique avec le FormRequest

        Entrepreneur::create([
            'user_id' => auth()->id(), // Associer à l'utilisateur connecté
            'nom' => $validated['nom'],
            'telephone' => $validated['telephone'],
            'mail' => $validated['mail'],
            'nationalite' => $validated['nationalite'],
        ]);

        return redirect()->route('entrepreneur.index')->with('success', 'L\'entrepreneur a été créé avec succès.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Entrepreneur $entrepreneur)
    {
        return view('entrepreneur.show', compact('entrepreneur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrepreneur $entrepreneur)
{
    return view('entrepreneur.edit', compact('entrepreneur'));
}
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEntrepreneurRequest $request, Entrepreneur $entrepreneur)
{
    $validated = $request->validated();

    $entrepreneur->update([
        'nom' => $validated['nom'],
        'telephone' => $validated['telephone'],
        'mail' => $validated['mail'],
        'nationalite' => $validated['nationalite'],
    ]);

    return redirect()->route('entrepreneur.index')->with('success', 'L\'entrepreneur a été mis à jour avec succès.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrepreneur $entrepreneur)
    {
        $entrepreneur->delete();
        return redirect()->route('entrepreneur.index')->with('success', 'L\'entrepreneur a été supprimé avec succès.');
    }

}
