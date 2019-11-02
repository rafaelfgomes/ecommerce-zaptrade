<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Image as ImageModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
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

        DB::beginTransaction();

        try {

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

                    $categoryProductImagesPath = 'ecommerce/products/' . $category->slug_name . '/';
                    $dbPath = 'images/'.$categoryProductImagesPath;
                    $fullPath = base_path() . '/public' . '/' . $dbPath;

                    if (!file_exists($fullPath)) {

                        mkdir($fullPath);

                    }

                    foreach ($request->file('product-images') as $image) {

                        $imgName = Str::uuid();
                        $imgExtension = $image->extension();

                        $imgPath = public_path($dbPath . $imgName . '.' . $imgExtension);

                        $img = Img::make($image)->resize(1000, 1100);
                        $img->save($imgPath);

                        $imgData = [
                            'name' => $imgName . '.' . $imgExtension,
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

        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json([ 'message' => $e->getMessage() ], 400);

        }

        DB::commit();

        return response()->json([ 'product' => $product ]);

    }

    public function update(ProductUpdateRequest $request, $id)
    {

        $category = Category::find($request->input('category-update-id'));

        $price = str_replace('R$ ', '', $request->input('product-update-price'));
        $price = str_replace('.', '', $price);
        $price = str_replace(',', '.', $price);

        $productData = [
            'name' => $request->input('product-update-name'),
            'price' => $price,
            'description' => $request->input('product-update-description'),
            'is_approved' => 1,
            'category_id' => $request->input('category-update-id')
        ];

        $product = tap(Product::where('id', $id))->update($productData)->first();

        if ($product) {

            if ($request->has('product-images')) {

                $categoryProductImagesPath = 'ecommerce/products/' . $category->slug_name . '/';
                $dbPath = 'images/'.$categoryProductImagesPath;
                $fullPath = base_path() . '/public' . '/' . $dbPath;

                if (!file_exists($fullPath)) {

                    mkdir($fullPath);

                }

                foreach ($request->file('product-images') as $image) {

                    $imgName = Str::uuid();
                    $imgExtension = $image->extension();

                    $imgPath = public_path($dbPath . $imgName . '.' . $imgExtension);

                    $img = Img::make($image)->resize(1000, 1100);
                    $img->save($imgPath);

                    $imgData = [
                        'name' => $imgName . '.' . $imgExtension,
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

    public function toggleApprove($id)
    {
        $product = Product::find($id);

        if ($product->is_approved == 1) {

            $approveName = 'desaprovado';
            $product->update(['is_approved' => 0]);

        } else {
            $approveName = 'aprovado';
            $product->update(['is_approved' => 1]);
        }

        return response()->json([ 'product' => $product, 'approve_name' => $approveName ]);

    }

}
