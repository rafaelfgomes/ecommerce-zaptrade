<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

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
    public function store(UserStoreRequest $request)
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

    public function update(UserUpdateRequest $request)
    {
        # code...
    }

}
