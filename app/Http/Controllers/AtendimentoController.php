<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtendimentoController extends Controller
{


    protected $validators = [];

    public function show($id)
    {

        $result = DB::connection("oracle")->table("atendime")
            ->where([
                ['cd_atendimento', $id]])
            ->first();

        if (count($result)) {
          $result->usuario = DB::connection("oracle")->table("paciente")
                ->where([
                    ['cd_paciente', $result->cd_paciente]])
                ->first();
        }


        return response()->json(['data' => $result]);
    }

}
