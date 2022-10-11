<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthor extends FormRequest
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
            'name_author' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'unique:authors',
            ],
        ];
    }

    public function messages()
    {
        return [
            'name_author.required' => 'O Campo Nome do Author é Obrigatório!',
            'name_author.min' => 'O Nome do Author tem que ter no Mínimo 3 caracteres',
            'name_author.max' => 'O Nome do Author tem que ter no Máximo 50 caracteres',
            'name_author.unique' => 'O Nome do Author tem que ser único'
        ];
    }
}
