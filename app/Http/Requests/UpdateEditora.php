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
        $editora = $this->editora;


        return [
            'name_editora' => [
                'required',
                'string',
                'min:3',
                'max:50',
               // "unique:editoras,name_editora,{$editora->id},id"
                Rule::unique('editoras')->ignore($this->editora)
            ],

        ];
    }


}
