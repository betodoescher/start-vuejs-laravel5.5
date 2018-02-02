<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    public function __construct(User $model)
    {
        $this->model = $model;

    }

    protected $validators = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6',
    ];

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function store(Request $request)
    {
        $request->validate($this->validators);

        $result = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'tipo_usuario' => request('tipo_usuario'),
            'cpf' => request('cpf')
        ]);

        return response()->json($result);
    }
}
