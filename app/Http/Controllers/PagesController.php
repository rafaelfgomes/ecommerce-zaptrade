<?php

namespace App\Http\Controllers;

use App\Category;
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

        return view('index')->with([ 
            'categories' => Category::all(),
        ]);
    
    }

    /**
     * Show the login form to admins.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminLogin()
    {

        return view('auth.admin.login')->with([
            'profiles', Profile::all()
        ]);
    
    }

    public function contact()
    {
        
        return view('pages.ecommerce.contact.form')->with([
            'categories', Category::all()
        ]);

    }

}
