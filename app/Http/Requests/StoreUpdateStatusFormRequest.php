<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateStatusFormRequest extends FormRequest
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
            'descricao'  => "required|min:3|max:100|unique:status,descricao,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'descricao.required'     => 'A descricao do status é obrigatório!',
            'descricao.min'          => 'A descricao do status deve ter pelomenos 3 caracteres!',
            'descricao.max'          => 'A descricao do status deve ter no máximo 100 caracteres!',
            'descricao.unique'       => 'A Descrição do status já cadastrado!'
        ];
    }
}
