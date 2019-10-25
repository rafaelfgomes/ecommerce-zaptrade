<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function details()
    {

        return view('pages.ecommerce.products.detail')->with([
            'categories' => Category::all()
        ]);

    }

    public function register()
    {

        return view('pages.dashboard.products.register')->with([
            'categories' => Category::all()
        ]);

    }

}
