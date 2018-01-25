<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioController extends Controller
{
    protected $model;

    public function __construct(\App\Formulario $model)
    {
        $this->model = $model;

    }
    protected $validators = [];

}
