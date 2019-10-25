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

            $user = ($profileId == 1) ? Admin::where('email', $email)->first() : User::where('email', $email)->first();

            if ($user) {

                if (Hash::check($password, $user->password)) {

                    $request->session()->regenerate();

                    Auth::login($user);

                    return redirect()->route('dashboard.index');

                } else {

                    return redirect()->route('admin.login.page');

                }
                

            } else {

                if ($profileId == 1) {

                    return redirect()->route('admin.login.page');
                
                }

                return redirect()->route('admin.login.page');

            }

        }

    }

}
