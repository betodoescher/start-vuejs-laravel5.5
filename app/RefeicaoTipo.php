<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RefeicaoTipo extends Model
{
    use Notifiable;

    protected $table = 'refeicao_tipos';

    protected $fillable = [
        'id',
        'descricao',
        'codigo_tipo_refeicao',
        'hora_inicio_refeicao',
        'hora_final_refeicao'
    ];
}
