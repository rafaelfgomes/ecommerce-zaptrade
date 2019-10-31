<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Image as ImageModel;
use App\Http\Requests\ProductStoreRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Img;

class ProductsController extends Controller
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

        return view('pages.dashboard.products.register')->with([
            'categories' => Category::all()
        ]);

    }

    public function show($id)
    {
        $product = Product::with(['category', 'images'])->find($id);

        return response()->json([ 'product' => $product ]);
    }

    public function store(ProductStoreRequest $request)
    {

        $category = Category::find($request->input('category-id'));

        $price = str_replace('R$ ', '', $request->input('product-price'));
        $price = str_replace('.', '',$price);
        $price = str_replace(',', '.', $price);

        $data = [
            'name' => $request->input('product-name'),
            'price' => $price,
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
                    if (!file_exists(base_path() . '/public' . '/' . $dbPath)) {

                        mkdir(base_path() . '/public' . '/' . $dbPath);

                    }
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
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        }

        return response()->json([ 'product' => $product ]);

    }

}
