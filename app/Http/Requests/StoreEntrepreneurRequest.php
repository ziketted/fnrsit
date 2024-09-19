<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntrepreneurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'mail' => 'required|email|unique:entrepreneurs,mail',
            'nationalite' => 'required|string|max:100',
        ];
    }
}
