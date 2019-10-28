<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Image as ImageModel;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $category = Category::find($request->input('category-id'));

        $data = [
            'name' => $request->input('product-name'),
            'price' => $request->input('product-price'),
            'description' => $request->input('product-description'),
            'category_id' => $request->input('category-id'),
            'is_approved' => 0
        ];

        $product = Product::create($data);

        if ($product) {

            if ($request->has('product-images')) {

                foreach ($request->file('product-images') as $key => $image) {

                    $img = Img::make($image);
                    $name = $image->getClientOriginalName();
                    $extension = $image->getExtension();

                    $fileName = $name.$extension;
                    $dbPath = 'images/'.$category->slug_name.'/';
                    $path = public_path($dbPath.$fileName);

                    $img->save($path);

                    $imgData = [
                        'name' => $name,
                        'path' => $dbPath,
                        'product_id' => $product->id
                    ];

                    ImageModel::create($imgData);

                }

            }

            DB::table('product_user')->insert([
                'product_id' => $product->id,
                'user_id' => Auth::user()->id
            ]);

        }

        return response()->json([ 'product' => $product ]);

    }

}
