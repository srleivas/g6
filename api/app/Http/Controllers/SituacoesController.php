<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalvarSituacaoRequest;
use App\Models\Situacao;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class SituacoesController extends Controller
{
    public function index()
    {
        return Situacao::all();
    }

    public function salvar(SalvarSituacaoRequest $request, int $id = null): Situacao
    {
        return Situacao::updateOrCreate(
            ['id' => $id],
            ['nome' => $request->nome]
        );
    }

    public function excluir(Request $request, int $id)
    {
        $situacao = Situacao::findOrFail($id);
        $tarefa = Tarefa::where('situacao_id', '=', $situacao->id)->first();
        
        if (!empty($tarefa)) {
            return response()->json([
                'error' => 'Não é possível excluir a situação pois esta se encontra vinculada à uma tarefa.',
                'message' => 'Não é possível excluir a situação pois esta se encontra vinculada à uma tarefa.',
            ], 400);
        }

        return $situacao->delete();
    }
}
