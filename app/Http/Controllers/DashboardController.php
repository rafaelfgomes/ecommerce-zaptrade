<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('pages.dashboard.index')->with([]);
    
    }

    public function userProfile()
    {

        return view('pages.dashboard.users.profile')->with([]);
    
    }

    public function productRegister()
    {
        
        return view('pages.dashboard.products.register')->with([]);

    }

    public function categoryRegister()
    {
        
        return view('pages.dashboard.categories.register')->with([]);

    }

}
