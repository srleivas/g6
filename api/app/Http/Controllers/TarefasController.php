<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalvarTarefaRequest;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function index()
    {
        return Tarefa::with('categoria', 'situacao')->get();
    }

    public function salvar(SalvarTarefaRequest $request)
    {
        return Tarefa::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'responsavel' => $request->responsavel,
                'categoria_id' => $request->categoria_id,
                'situacao_id' => $request->situacao_id,
                'data_criacao' => now(),
                'data_prevista' => $request->data_prevista,
                'data_finalizacao' => $request->data_finalizacao,
            ]
        );
    }

    public function excluir(Request $request, int $id)
    {
        return Tarefa::where('id', $id)->delete();
    }
}

