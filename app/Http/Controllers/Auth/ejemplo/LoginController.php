<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/

    public function showLoginForm(){
        return view('app.login');
    }

    protected function redirectTo(){
        switch (auth()->user()->idrol) {
            case 4:
                //Socio
                return '/socio/bienvenido';
                break;

            case 3:
                //Personal
                return '/socio/bienvenido';

                break;
            case 2:
                //Administrativo
                return '/servicio/listado';

                break;
            case 1:
                //Gerente
                return '/socio/bienvenido';

                break;
            
            default:
                return '/home';
                break;
        }

       
    }

    protected function sendFailedLoginResponse(Request $request){
        dd('login malo');
        $errors=[$this->username() => 'Login incorrecto'];

        return redirect()->back()
            ->withInput($request->only($this->username(),'remember'))
            ->withErrors($errors);
    }
}
