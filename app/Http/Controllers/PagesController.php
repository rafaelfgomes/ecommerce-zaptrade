<?php

namespace App\Http\Controllers;

use App\Category;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('pages.dashboard.users.profile')->with([
            'categories' => Category::all(),
            'profiles' => Profile::all(),
            'userProfileName' => Auth::user()->profile->name,
            'userProfileId' => Auth::user()->profile->id
        ]);

    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {

        return view('auth.dashboard.login')->with([
            'profiles' => Profile::all()
        ]);

    }

    public function contact()
    {

        return view('pages.ecommerce.contact.form')->with([
            'categories' => Category::all()
        ]);

    }

}
