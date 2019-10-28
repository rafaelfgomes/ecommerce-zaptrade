<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductStoreRequest;
use Intervention\Image\Facades\Image as Img;

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

    public function store(ProductStoreRequest $request)
    {

        if ($request->has('product-images')) {
            
            foreach ($request->file('product-images') as $key => $image) {
                $im = Img::make($image);
                $name = $image->getClientOriginalName();
                

            }

        }


        return response()->json($request->all());

    }

}
