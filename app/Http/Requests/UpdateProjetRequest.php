<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Autorisez ou non cette requête (true si tout utilisateur est autorisé)
        return true;
    }

    /**
     * Règles de validation pour la mise à jour du projet.
     */
    public function rules(): array
    {
        return [
            'titre' => 'required|string|max:255',
            'budget' => 'required|numeric|min:0',
            'debut' => 'required|date',
            'fin' => 'required|date|after_or_equal:debut',
            'secteur_id' => 'required|exists:secteurs,id',
            'entrepreneur_id' => 'required|exists:entrepreneurs,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
