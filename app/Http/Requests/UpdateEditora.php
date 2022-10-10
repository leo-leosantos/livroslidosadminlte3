<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEditora extends FormRequest
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
            'name_editora' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('editoras')->ignore($this->editora)

                //"unique:editoras,name_editora,{$this->id},id",
            ],
            
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name_editora.required' => 'O Campo Nome da Editora é Obrigatório!',
    //         'name_editora.min' => 'O Nome da Editora tem que ter no Mínimo 3 caracteres',
    //         'name_editora.max' => 'O Nome da Editora tem que ter no Máximo 50 caracteres',
    //         'name_editora.unique' => 'O Nome da Editora tem que ser único'
    //     ];
    // }
}
