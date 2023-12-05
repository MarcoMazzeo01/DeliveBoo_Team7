<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class OrderDataFormRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'form.name' => 'required|string|max:50',
            'form.lastName' => 'required|string|max:50',
            'form.tel' => 'required|max:15|min:9',
            'form.address' => 'required|string|max:40',
            'form.note' => 'nullable|string|max:100',
            'form.email' => 'required|string|email',

        ];
    }
}