<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateModalFormRequest extends FormRequest
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
        $id = $this->segment(3);
        
        return [
            'descricao'  => "required|min:3|max:100|unique:modais,descricao,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'descricao.required'     => 'A descricao do modal é obrigatório!',
            'descricao.min'          => 'A descricao do modal deve ter pelomenos 3 caracteres!',
            'descricao.max'          => 'A descricao do modal deve ter no máximo 100 caracteres!',
            'descricao.unique'       => 'A Descrição do modal já cadastrado!'
        ];
    }
}
