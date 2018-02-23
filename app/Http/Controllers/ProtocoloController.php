<?php

namespace App\Http\Controllers;


class ProtocoloController extends Controller
{
    protected $model;

    public function __construct(\App\Protocolo $model)
    {
        $this->model = $model;

    }
    protected $validators = [];

    public function show($id) {

        return $this->model->where(['protocolo' => $id])->with(['formulario'])->get();
    }
    public function showFormulario($id) {

        return $this->model->where(['formulario_id' => $id])->with(['formulario'])->get();
    }
}
