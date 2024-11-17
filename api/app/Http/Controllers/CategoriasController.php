<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalvarCategoriaRequest;
use App\Models\Categoria;
use App\Models\Tarefa;
use Request;

class CategoriasController extends Controller
{
    public function index()
    {
        return Categoria::all();
    }

    public function salvar(SalvarCategoriaRequest $request, int $id = null): Categoria
    {
        return Categoria::updateOrCreate(
            ['id' => $id],
            ['nome' => $request->nome]
        );
    }

    public function excluir(Request $request, int $id)
    {
        $categoria = Categoria::findOrFail($id);
        $tarefa = Tarefa::where('categoria_id', '=', $categoria->id)->first();
        
        if (!empty($tarefa)) {
            return response()->json([
                'error' => 'Não é possível excluir a categoria pois esta se encontra vinculada à uma tarefa.',
                'message' => 'Não é possível excluir a categoria pois esta se encontra vinculada à uma tarefa.',
            ], 400);
        }

        return $categoria->delete();
    }
}
