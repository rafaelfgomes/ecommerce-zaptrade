<?php

namespace App\Http\Controllers;

use App\Category;
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

    public function profile()
    {

        return view('pages.dashboard.users.profile')->with([]);

    }

    public function products()
    {

        return view('pages.dashboard.products.index')->with([]);

    }

    public function categories()
    {

        return view('pages.dashboard.categories.index')->with([

            'categories' => Category::all()

        ]);

    }

}
