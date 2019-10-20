<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function show($name)
    {

        $products = [];

        return view('pages.ecommerce.categories.show')->with([
            'categories' => Category::all(),
            'selected' => Category::where('slug_name', $name)->first('name'),
            'products' => $products
        ]);
    
    }

}