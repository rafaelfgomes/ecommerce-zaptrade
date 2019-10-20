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

}
