<?php

namespace App\Http\Controllers;

use App\Protocolo;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    protected $model;

    public function __construct(\App\Formulario $model)
    {
        $this->model = $model;

    }
    protected $validators = [];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validators);
        $result = $this->model->create($request->all());

        $protocolo = str_replace(['-',' ',':'], '', $result->created_at) . $result->id;

        $result->protocolo = Protocolo::create(['formulario_id' => $result->id, 'protocolo' => $protocolo]);


        return response()->json($result);
    }



}
