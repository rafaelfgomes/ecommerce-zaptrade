<?php

namespace App\Http\Controllers;

use App\Product;
use App\Profile;
use App\Category;

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

        $products = Product::where('is_approved', 1)->with('images')->paginate(4);

        return view('index')->with([
            'categories' => Category::all(),
            'products' => $products
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
