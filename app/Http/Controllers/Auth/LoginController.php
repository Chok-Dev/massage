<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            //'email' => 'required|email|exists:users,email',
            'name' => 'required|exists:users',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('name' => $input['name'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 'admin')
            {
              return redirect()->route('index');
            }
            else
            {
              return redirect()->route('index');
            }
        }
        else
        {
            $error = ValidationException::withMessages([
                'password' => ['Password worng.'],
             ]);

             throw $error;
        }
    }
}
