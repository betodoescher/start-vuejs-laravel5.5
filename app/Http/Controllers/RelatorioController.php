<?php

namespace App\Http\Controllers;

use App\Relatorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    protected $model;

    public function __construct(\App\Relatorio $model)
    {
        $this->model = $model;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRelatorio(Request $request)
    {
        $fields = $request->all()['fields'] ?? '*';

        $where = $request->all()['where'] ?? [];

        $group = $request->all()['group'] ?? null;

        $notNull = $request->all()['notnull'] ?? null;

        $sql = $this->model
            ->select(DB::raw($fields))
            ->where($where)
            ->whereYear('created_at','=',date('Y'))
            ->whereMonth('created_at','=',date('m'));

        if($notNull)
            $sql->whereNotNull($notNull);

        if($group)
            $sql->groupBy($group);

        return $sql->get();
    }
}
