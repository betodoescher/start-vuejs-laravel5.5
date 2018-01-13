<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class RefeicaoTipo extends Model
{

    protected $table = 'refeicao_tipos';

    protected $fillable = [
        'id',
        'descricao',
        'refeicao_classificacao_id',
        'hora_inicio_refeicao',
        'hora_final_refeicao'
    ];

    public function refeicaoClassificacao() {
       return $this->belongsTo(RefeicaoClassificacao::class);
    }
}
