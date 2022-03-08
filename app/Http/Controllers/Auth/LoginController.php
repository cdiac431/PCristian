<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\Redirect;
use App\Models\User;

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

    /*
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /*
     * Create a new controller instance.
     *
     * @return void

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/


public function loginRedirectProposta(Request $request){

    // return "hola";
    // return var_dump($request);

    $idProposta = $request->proposta;
    // return $idProposta;
    $credentials = $request->only('email', 'password');
    $credentials = array('email' => $request->email, 'password' => $request->password, "estat" => 'actiu');
    $credentials2 = array('email' => $request->email, 'password' => $request->password);
    //exit (var_dump($request['password']. ' hola ' . Hash::make($request['password'])));


    if (Auth::attempt($credentials,false)) {
        $request->session()->regenerate();
        $user = Auth::user();

        return redirect()->route('propostes.show', ['proposta' => $idProposta ])->with('user');
    }else if(Auth::attempt($credentials2,false))
        {
            return back()->withErrors([
                'error' => 'Usuari desactivat'
            ]);
        }

    return back()->withErrors([
        'error' => 'L\'email o la contrasenya no son vàlids '
    ]);
}
    public function login(Request $request){



        $credentials = $request->only('email', 'password');
        $credentials = array('email' => $request->email, 'password' => $request->password, "estat" => 'actiu');
        $credentials2 = array('email' => $request->email, 'password' => $request->password);
        //exit (var_dump($request['password']. ' hola ' . Hash::make($request['password'])));


        if (Auth::attempt($credentials,false)) {
            $request->session()->regenerate();
            $user = Auth::user();

            return redirect()->route('management')->with('user');
        }else if(Auth::attempt($credentials2,false))
            {
                return back()->withErrors([
                    'error' => 'Usuari desactivat'
                ]);
            }

        return back()->withErrors([
            'error' => 'L\'email o la contrasenya no son vàlids '
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
         return redirect('/');
    }
}
