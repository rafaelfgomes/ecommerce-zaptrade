<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register()
    {
        
        $profileId = Auth::user()->profile->id;

        return view('pages.dashboard.users.register')->with([
            'profiles' => Profile::all(),
            'userProfileId' => $profileId
        ]);

    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function store(UserRegisterRequest $request)
    {

        // Retrieve the validated input data
        $validated = $request->validated();

        if ($validated) {
            
            $params = [

                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'profile_id' => $request->profile_id

            ];
            
            $user = User::create($params);

        }

        return response()->json([ 'user' => $user ]);

    }

}
