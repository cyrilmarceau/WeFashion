<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'description' => 'required',
            'price' => 'required',
            'reference' => 'required|size:16',
            'sizes' => 'required',
            'sizes.*' => 'integer',
            'picture' => 'image|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom du produit est obligatoire',
            'name.min' => 'Le nom du produit doit faire 5 caractères minimum',
            'description.required' => 'Une description du produit est obligatoire',
            'price.required' => 'Le prix du produit est obligatoire',
            'reference.size' => 'La référence du produit doit faire 16 caractères',
            'reference.required' => 'La référence du produit est obligatoire',
            'sizes.required' => "Au moins une taille est obligatoire",
            "picture.required" => "La photo ne doit pas dépasser 1 mega"
        ];
    }
}