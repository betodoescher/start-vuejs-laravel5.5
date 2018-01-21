<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        if(!$this->validateLoginOracle($credentials))
            return false;

        $credentials['username'] = 'ROBERTO.CORREA';

        $user = $this->getUser($credentials['username']);

        if(!count($user))
            return false;

        $token = $this->guard()->login($user);

        if ($token) {
            $this->guard()->setToken($token);

            return true;
        }

        return false;
    }

    protected function validateLoginOracle($crendentials)
    {
        $user = DB::connection("oracle")->table("DG_USUARIOS")->where([['username','ROBERTO.CORREA'],['password','UTIN]a^?Vdik`^afwtgl~y|~']])->first();
        if(count($user))
            return true;

        return false;
    }

    protected function getUser($username) {
        $user = User::where('username', $username)->first();
        if(count($user))
            return $user;

        return User::create(['username' => $username]);
    }

    public function hash($crendentials)
    {
       // TODO generate hash to select password from oracle
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        $token = (string) $this->guard()->getToken();
        $expiration = $this->guard()->getPayload()->get('exp');

        return [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration - time(),
        ];
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
    }
}
