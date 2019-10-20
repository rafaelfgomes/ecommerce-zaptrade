<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

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

        return view('index');
    
    }

    /**
     * Show the login form to admins.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminLogin()
    {

        $profiles = Profile::all();

        return view('auth.admin.login')->with('profiles', $profiles);
    
    }

    public function contact()
    {
        
        return view('pages.ecommerce.contact');

    }

    

}
