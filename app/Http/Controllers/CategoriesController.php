<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    
    public function appliances()
    {
        
        return view('pages.ecommerce.categories.appliances')->with('categories', Category::all());

    }

    public function computing()
    {
        
        return view('pages.ecommerce.categories.computing')->with('categories', Category::all());

    }

    public function furniture()
    {
        
        return view('pages.ecommerce.categories.furniture')->with('categories', Category::all());

    }

    public function mobile()
    {
        
        return view('pages.ecommerce.categories.mobile')->with('categories', Category::all());

    }

}