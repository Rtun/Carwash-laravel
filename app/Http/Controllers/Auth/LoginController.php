<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }*/

    function showLoginForm(){
        return view('auth.login');
    }
//con la funcion auth()->user() recuperamos el modelo del usuario que esta en la session del sistema
    protected function redirectTo(){
        //dd(auth()->user());
        switch (auth()->user()->idrol) {
            case 4:
                //Socio
                return '/socio/bienvenido';
                break;

            case 3:
                //Personal
                return 'servicios/listado';

                break;
            case 2:
                //Administrativo
                return 'servicios/listado';

                break;
            case 1:
                //Gerente
                return '/personal/empleados';

                break;
            
            default:
                return '/';
                break;
        }
    }
    protected function sendFailedLoginResponse(Request $request){
        //dd('login malo');
        $errors = [$this->username() => 'Login incorrecto'];

        return redirect()->back()
            ->withInput($request->only($this->username(),'remember'))
            ->withErrors($errors);
    }
}
