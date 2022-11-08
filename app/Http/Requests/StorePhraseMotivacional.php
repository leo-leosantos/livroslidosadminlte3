<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhraseMotivacional extends FormRequest
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
            'phrase' => [
                'required',
                'string',
                'min:3',
            ],
            'author_phrase'=>[
                'required',
                'string',
                'min:3',
            ]

        ];
    }

    public function messages()
    {
        return [
            'phrase.required' => 'O Campo Frase Motivacional é Obrigatório!',
            'author_phrase.required' => 'O Campo Autor da Frase é Obrigatório!',
            'phrase.min' => 'A Frase tem que ter no Mínimo 3 caracteres',
            'author_phrase.required' => 'O Campo Author da Frase é Obrigatório!',
            'author_phrase.min' => 'A Nome do Author tem que ter no Mínimo 3 caracteres',

        ];
    }
}
