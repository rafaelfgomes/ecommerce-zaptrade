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

            $params = [

                'name' => $request->input('name'),
                'slug_name' => $request->input('slug-name')

            ];

            Category::insert($params);

        }

    }

    public function update(CategoryStoreRequest $request, $id)
    {
        
        // Retrieve the validated input data
        $validated = $request->validated();

        if ($validated) {
            
            $params = [

                'name' => $request->input('category-name'),
                'slug_name' => $request->input('slug-name')

            ];

            Category::where('id', $id)->update($params);

        }

    }

    public function getSlugName($id)
    {

        $slug = Category::where('id', $id)->first('slug_name');

        return response()->json([ 'data' => $slug ]);

    }

}