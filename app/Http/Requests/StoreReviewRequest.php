<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'rating' => 'required',
            'description' => 'required|min:5'
        ];
    }
    public function messages()
    {
        return [
            'rating' => 'Rating richiesto',
            'rating.min' => 'Inserire minimo 5 lettere.',
            'description' => 'Descrizione richiesta.'
        ];
    }
}
