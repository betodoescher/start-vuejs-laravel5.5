<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balanca extends Model
{
    protected $table = 'balancas';

    protected $fillable = [
        'id',
        'descricao',
        'porta',
        'velocidade_porta',
        'bits_dados',
        'bits_parada',
        'paridade',
        'bloqueada',
    ];
}
