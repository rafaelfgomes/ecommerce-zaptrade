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

    public function update(UserUpdateRequest $request, $id)
    {

        // Retrieve the validated input data
        $validated = $request->validated();

        if ($validated) {

            $user = User::find($id);

            if (is_null($request->input('password'))) {
                $params = [

                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'profile_id' => $request->input('user-profile-id')

                ];

            } else {

                if (Hash::check($request->input('password'), $user->password)) {

                    $params = [
    
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'password' => Hash::make($request->input('new-password')),
                        'profile_id' => $request->input('user-profile-id')
    
                    ];
    
                } else {
    
                    return response()->json([ 'message' => 'Senha atual não confere' ], 400);
    
                }

            }

            
            $user->update($params);
    
            return response()->json([ 'user' => $user ]);

        }

        return response()->json([ 'message' => 'Não foi possível atualizar o usuário' ]);

    }

}
