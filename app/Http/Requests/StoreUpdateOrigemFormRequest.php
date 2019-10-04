<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateOrigemFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        $id = $this->segment(3);
        
        return [
            'descricao'  => "required|min:3|max:100|unique:origens,descricao,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'descricao.required'     => 'A descricao da origem é obrigatório!',
            'descricao.min'          => 'A descricao da origem deve ter pelomenos 3 caracteres!',
            'descricao.max'          => 'A descricao da origem deve ter no máximo 100 caracteres!',
            'descricao.unique'       => 'A Descrição da origem já cadastrado!'
        ];
    }
}
