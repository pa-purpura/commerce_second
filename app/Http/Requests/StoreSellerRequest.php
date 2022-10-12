<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerRequest extends FormRequest
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
            'name' => 'required|min:2',
            'address' => 'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Nome richiesto',
            'name.min' => 'Inserire minimo 2 lettere.',
            'address' => 'Indirizzo richiesto.'
        ];
    }
}
