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
            'price' => 'required',
            'reference' => 'required|min:16',
            'sizes' => 'required',
            'picture' => 'image|max:1000|required'
//             'description' => 'required|string',
//            'genre_id' => 'integer'

//             'authors.*' => 'integer', // .* correspond au faite que c'est un tableau
            
//             'picture' => 'image|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom du produit est obligatoire',
            'name.min' => 'Le nom du produit doit faire 5 caractères minimum',
            'price.required' => 'Le prix du produit est obligatoire',
            'reference.min' => 'La référence du produit doit faire 16 caractères minimum',
            'reference.required' => 'La référence du produit est obligatoire',
            'sizes.required' => "Au moins une taille est obligatoire",
            "picture.required" => "Une photo du produit est obligatoire"
            // 'description.required' => 'La description du livre est obligatoire !',
            // 'description.string' => 'La description doit être un texte.',
        ];
    }
}