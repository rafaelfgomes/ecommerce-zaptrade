<?php

namespace App\Http\Controllers;

use App\Category;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('pages.dashboard.index')->with([]);

    }

    public function profile()
    {

        return view('pages.dashboard.users.profile')->with([
            'user' => Auth::user(),
            'profiles' => Profile::all(),
            'userProfileName' => Auth::user()->profile->name,
            'userProfileId' => Auth::user()->profile->id
        ]);

    }

    public function products()
    {

        $products = [];

        return view('pages.dashboard.products.index')->with([

            'products' => $products
        
        ]);

    }

    public function categories()
    {

        return view('pages.dashboard.categories.index')->with([

            'categories' => Category::paginate(4)

        ]);

    }

}
