<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnidadeController extends Controller
{

    protected $validators = [];

    public function index(Request $request)
    {

        $result = DB::connection("oracle")->table("unid_int")

            ->get();




        return response()->json(['data' => $result]);
    }

}
