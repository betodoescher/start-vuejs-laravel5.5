<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BalancaController extends Controller
{
    use \App\Http\Controllers\ApiControllerTrait;

    protected $model;

    protected $validators = [
        'descricao' => 'required|max:20'
    ];


    public function __construct(\App\Balanca $model)
    {
        $this->model = $model;
    }

}
