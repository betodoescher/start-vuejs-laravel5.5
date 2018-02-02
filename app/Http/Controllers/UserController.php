<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(User $model)
    {
        $this->model = $model;

    }

    protected $validators = [];
}
