<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RefeicaoTipoController extends Controller
{
    use \App\Http\Controllers\ApiControllerTrait;

    protected $model;

    protected $relationships = 'refeicaoClassificacao';

    protected $validators = [
        'descricao' => 'required|max:20'
    ];


    public function __construct(\App\RefeicaoTipo $model)
    {
        $this->model = $model;
    }





}
