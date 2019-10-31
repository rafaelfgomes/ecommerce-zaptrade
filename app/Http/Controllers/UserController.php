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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');

    }

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
     * @param  \App\Http\Requests\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {

        // Retrieve the validated input data
        $validated = $request->validated();

        if ($validated) {

            $params = [

                'name' => $request->input('user-name'),
                'email' => $request->input('user-email'),
                'password' => Hash::make($request->input('user-password')),
                'profile_id' => $request->input('user-profile-id')

            ];

            $user = User::create($params);

        }

        return response()->json([ 'user' => $user ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  \App\Http\Requests\UserUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
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
