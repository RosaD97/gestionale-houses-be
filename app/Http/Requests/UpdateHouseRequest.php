<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHouseRequest extends FormRequest
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
            // 'title' => 'required|unique:houses|string|max:50',
            'title' => [
                'required',
                Rule::unique('houses')->ignore($this->house),
                'string',
                'max:50'
            ],
            'description' => 'nullable|string',
            'img' => 'image|max:2048',
            'price' => 'required',
            'type' => 'required'
        ];
    }
}
