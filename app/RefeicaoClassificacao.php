<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefeicaoClassificacao extends Model
{
    protected $table = 'refeicao_classificacoes';

    protected $fillable = [
        'id',
        'descricao'
    ];

}
