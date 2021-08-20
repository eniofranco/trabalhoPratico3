<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoRequest extends FormRequest
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
            'titulo' => 'bail|required|min:3|max:100',
            'empresa_id' => 'bail|required|integer',
            'tipo_id' => 'bail|required|integer',
            'salario' => 'bail|required|numeric|min:0',
            'codigo' => 'bail|required|integer|min:0',
            'descricao' => 'bail|nullable|string',
            'responsavel' => 'bail|required|min:1|max:100',
        ];
    }

    public function attributes()
    {
        return[
            'empresa_id' => 'funcionário',
            'titulo' => 'departamento',
            'tipo_id' => 'tipo de departamento',
            'salario' => 'salário',
            'codigo' => 'matrícula do departamento',
            'responsavel' => 'responsável',
            'descricao' => 'comentário',
        ];
    }

}
