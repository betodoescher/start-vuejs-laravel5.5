<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class RefeicaoClassificacaoController extends Controller
{
    use \App\Http\Controllers\ApiControllerTrait;

    protected $model;


    protected $validators = [
        'descricao' => 'required|max:20'
    ];


    public function __construct(\App\RefeicaoClassificacao $model)
    {
        $this->model = $model;
    }
}
