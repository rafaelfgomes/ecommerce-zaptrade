<?php

namespace App\Http\Controllers;

use App\Product;
use App\Profile;
use App\Category;
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

        $this->middleware('auth')->except('login');

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('pages.dashboard.users.profile')->with([
            'user' => Auth::user(),
            'profiles' => Profile::all(),
            'userProfileName' => Auth::user()->profile->name,
            'userProfileId' => Auth::user()->profile->id
        ]);

    }

    /**
     * List all products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products()
    {

        $products = Product::with(['images', 'category', 'users'])->get();

        if (Auth::user()->profile->id > 1) {
            $products = $products->filter(function ($value) {
                return $value->users[0]->id == Auth::user()->id;
            });
        }

        return view('pages.dashboard.products.index')->with([

            'products' => $products,
            'categories' => Category::all()

        ]);

    }

    /**
     * List all categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function categories()
    {

        return view('pages.dashboard.categories.index')->with([

            'categories' => Category::with('products')->paginate(4)

        ]);

    }

}
