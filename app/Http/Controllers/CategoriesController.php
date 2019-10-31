<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Product;

class CategoriesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');

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

        }

        return response()->json([ 'category' => $category ]);

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

        }

        return response()->json([ 'category' => $category ]);

    }

}