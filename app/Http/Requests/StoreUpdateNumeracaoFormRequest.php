<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateNumeracaoFormRequest extends FormRequest
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
            'ano'       => "required|min:4|max:4|unique:numeracoes,ano,{$id},id",
            'numeracao' => "required"
            //'status'    => "required|unique:numeracoes,status,{$id},id"
        ];
    }
    
    public function messages() 
    {
        return [
            'ano.required'        => 'O ano é obrigatório!',
            'ano.min'             => 'O ano deve ter 4 caracteres!',
            'ano.max'             => 'O ano deve ter 4 caracteres!',
            'ano.unique'          => 'O ano  já está cadastrado!',
            'numeracao.required'  => 'A numeração é obrigatória!',
            //'status.required'     => 'O status é obrigatório!',
            //'status.unique'       => 'Só pode haver um ano com status 1!',
            
        ];
    }
}
