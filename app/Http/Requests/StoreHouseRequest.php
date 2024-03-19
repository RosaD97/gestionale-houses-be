<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHouseRequest extends FormRequest
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
            'title' => 'required|unique:houses|string|max:50',
            'description' => 'nullable|string',
            'img' => 'image|max:2048|required',
            'price' => 'required',
            'type' => 'required',
            'numeroStanze' => 'required',
            'bagno' => 'nullable',
            'wifi' => 'nullable',
            'riscaldamento' => 'nullable',
            'ariaCondizionata' => 'nullable',
            'lavatrice' => 'nullable',
            'parcheggio' => 'nullable',
            'inEvidenza' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'via' => 'nullable',
            'cap' => 'nullable',
            'citta' => 'nullable',
            'provincia' => 'nullable'
        ];
    }
}
