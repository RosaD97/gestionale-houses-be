<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAffittuariRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|max:50',
            'cognome' => 'required|string|max:50',
            'tipo_contratto' => 'required',
            'durata_contratto' => 'required',
            'telefono' => 'required',
            'email' => 'nullable|email',
            'note' => 'nullable',
            'house_id' => 'required',
            'inizio_contratto' => 'nullable',
            'canone' => 'nullable'
        ];
    }
}
