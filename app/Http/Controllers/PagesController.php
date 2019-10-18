<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

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

        return view('auth.admin.login');
    
    }

    /**
     * Show the login form to sellers.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sellerLogin()
    {

        return view('auth.user.login');
    
    }

}
