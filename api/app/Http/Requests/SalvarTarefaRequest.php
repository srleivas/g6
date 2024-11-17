<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalvarTarefaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'categoria_id' => 'required|exists:categorias,id',
            'situacao_id' => 'required|exists:situacoes,id',
            'nome' => 'required|string|max:100',
            'descricao' => 'required|string|max:2000',
            'responsavel' => 'required|string|max:200',
            'data_prevista' => 'required|date',
            'data_finalizacao' => 'required|date',
        ];
    }
}
