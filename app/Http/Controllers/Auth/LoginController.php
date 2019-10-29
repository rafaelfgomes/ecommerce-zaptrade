<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');

    }

    public function login(LoginRequest $request)
    {
        // Retrieve the validated input data
        $validated = $request->validated();

        if ($validated) {

            $email = $request->input('email');
            $password = $request->input('password');
            $profileId = intval($request->input('profile-id'));

            $user = User::where('email', $email)->where('profile_id', $profileId)->first();

            if (!is_null($user)) {

                if (Hash::check($password, $user->password)) {

                    $request->session()->regenerate();

                    Auth::login($user);

                    return response()->json([ 'url' => route('dashboard.index') ]);

                } else {

                    return response()->json([ 'message' => 'Usuário ou senha inválidos' ], 400);

                }


            } else {

                if ($profileId == 1) {

                    return response()->json([ 'message' => 'Gerente não cadastrado' ], 404);

                }

                return response()->json([ 'message' => 'Vendedor não cadastrado' ], 404);

            }

        }

    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        
        Auth::guard()->logout();
        $request->session()->invalidate();
        return route('dashboard.login.page');

    }

}
