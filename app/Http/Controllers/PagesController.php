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

    /**
     * Show the contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {

        return view('pages.ecommerce.contact.form')->with([
            'categories' => Category::all()
        ]);

    }

    /**
     * Show the product product detail page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function details($id)
    {

        $product = Product::where('id', $id)->with('images')->first();
        $countImages = count($product->images);

        return view('pages.ecommerce.products.detail')->with([
            'categories' => Category::all(),
            'product' => $product,
            'imagesNumber' => $countImages
        ]);

    }

    /**
     * Show the product category page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($name)
    {

        $category = Category::where('slug_name', $name)->first();

        $products = Product::where('category_id', $category->id)->where('is_approved', 1)->with('images')->paginate(4);

        return view('pages.ecommerce.categories.show')->with([
            'categories' => Category::all(),
            'selected' => Category::where('slug_name', $name)->first('name'),
            'products' => $products
        ]);

    }

}
