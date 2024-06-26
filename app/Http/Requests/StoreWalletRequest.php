<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreWalletRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {


        return [
            'title' => 'required|max:128',
            'description' => 'required|max:128',
            'new_image' => 'required|file|jpeg,image/png,image/gif|max:2048',

        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'description.required' => 'Inserire la descrizione|max:128',
             'new_image' => 'Inserisci un immagine'
        ];
    }
}
