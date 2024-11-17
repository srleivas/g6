<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tarefa extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'tarefas';
    public $fillable = [
        'categoria_id',
        'situacao_id',
        'data_finalizacao',
        'data_criacao',
        'data_prevista',
        'nome',
        'descricao',
        'responsavel'
    ];

    public function situacao(): BelongsTo
    {
        return $this->belongsTo(Situacao::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
