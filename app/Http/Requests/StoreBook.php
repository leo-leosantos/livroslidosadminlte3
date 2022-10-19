<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBook extends FormRequest
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
            'title' => 'required|string|min:3|max:50',
            'page_number'=>'required',
            'date_start_reading' => 'required',
            'synopses' => 'required|string|min:3|max:9999',
            'author_id' => 'required',
            'editora_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'date_start_reading.required' => 'O campo Data Início da Leitura é obrigatório.',
            'author_id.required' => 'O Campo Nome do Author é obrigatório.',
            'editora_id.required' => 'O Campo Nome da Editora é obrigatório.',
        ];
    }
}
