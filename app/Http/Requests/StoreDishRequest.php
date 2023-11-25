<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
            "course_id" => 'required|present',       
            "name" => 'required|string|max:30',
            "price" => 'required|numeric|min:0',
            "image" => 'image|max:512',
            "description" => 'required',
            "visible" => 'nullable'
            

        ];
        }

    public function messages()
    {
        return [
            "course_id.required" => 'Campo obbligatorio',
            "course_id.present" => 'Il valore no è presente fra le opzioni',

            "name.required" => 'Campo obbligatorio',
            "name.string" => 'Il nome deve essere una stringa',
            "name.max" => 'Il nome non può superare i 30 caratteri',

            "price.required" => 'Campo è obbligatorio',
            "price.numeric" => 'Il prezzo non può contenere lettere e/o simboli',
            "price.min" => 'il prezzo del piatto non può essere negativo',

            "image.image" => "Il file nn è una immagine",
            "image.max" => "peso massimo axccetato 512 kb",
           
            "description.required" => "la descrizione è obbligatoria"
    
        ];
    }
}