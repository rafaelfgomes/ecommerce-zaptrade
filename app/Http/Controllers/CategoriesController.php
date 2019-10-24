<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

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

    public function register()
    {
        
        return view('pages.dashboard.categories.register')->with([
            'categories' => Category::all()
        ]);

    }

    public function store(CategoryStoreRequest $request)
    {

        // Retrieve the validated input data
        $validated = $request->validated();

        if ($validated) {

            $params = [

                'name' => $request->name,
                'slug_name' => $request->slug

            ];

            $category = Category::create($params);

            return response()->json([ 'category' => $category ]);

        }

    }

    public function update(CategoryUpdateRequest $request)
    {

        // Retrieve the validated input data
        $validated = $request->validated();

        if ($validated) {

            $category = Category::find($request->input('id'));

            $category->name = $request->input('name');
            $category->slug_name = $request->input('slug');

            $category->save();

            return response()->json([ 'category' => $category ]) ;

        }

    }

    public function getCategory($id)
    {

        $data = Category::where('id', $id)->first();

        return response()->json([ 'data' => $data ]);

    }

}