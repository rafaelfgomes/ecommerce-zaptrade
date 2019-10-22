<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryStoreRequest;

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

    public function store(CategoryStoreRequest $request)
    {

        // Retrieve the validated input data
        $validated = $request->validated();

        if ($validated) {

            dd($request->all());

            $params = [

                'name' => $request->input('name'),
                'slug_name' => $request->input('slug-name')

            ];

            Category::create($params);

        }

    }

    

}