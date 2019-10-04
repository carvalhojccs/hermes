<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRemetenteFormRequest extends FormRequest
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
            'descricao'  => "required|min:3|max:100|unique:remetentes,descricao,{$id},id",
            'sigla' => "required|unique:remetentes,sigla,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'descricao.required'     => 'A descricão do remetente é obrigatório!',
            'descricao.min'          => 'A descricão do remetente deve ter pelomenos 3 caracteres!',
            'descricao.max'          => 'A descricão do remetente deve ter no máximo 100 caracteres!',
            'descricao.unique'       => 'Esta descrição já está cadastrada!',
            'sigla.required'    => 'A sigla do remetente é obrigatória!',
            'sigla.unique'      => 'Sigla do remetente já cadastrada!',
        ];
    }
}
