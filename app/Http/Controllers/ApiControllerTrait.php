<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

trait ApiControllerTrait
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->all()['limit'] ?? 20;

        $fields = $request->all()['fields'] ?? '*';
        $groupBy = isset($request->all()['group']) ? explode(',',$request->all()['group']) : null;

        $order = $request->all()['order'] ?? null;

        if ($order !== null) {
          $order = explode(',', $order);
        }

        $order[0] = $order[0] ?? 'id';
        $order[1] = $order[1] ?? 'asc';

        $where = $request->all()['where'] ?? [];

        $like = $request->all()['like'] ?? null;
        if ($like) {
          $like = explode(',', $like);
          $like[1] = '%' . $like[1] . '%';
        }

        $result = $this->model->select(DB::raw($fields))
          ->where(function($query) use ($like) {
            if ($like) {
              return $query->where($like[0], 'like', $like[1]);
            }
            return $query;
          })
          ->where($where)
          ->with($this->relationships())
          ->orderBy($order[0], $order[1]);

            if($groupBy)
               $result = $result->groupBy($groupBy);

            $result = $result->paginate($limit);

        return response()->json($result);
    }

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
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->model->with($this->relationships())
          ->findOrFail($id);
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->model->findOrFail($id);
        $result->update($request->all());
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $result = $this->model->findOrFail($id);
      $result->delete();
      return response()->json($result);
    }

    protected function relationships()
    {
      if (isset($this->relationships)) {
        return $this->relationships;
      }
      return [];
    }
}
