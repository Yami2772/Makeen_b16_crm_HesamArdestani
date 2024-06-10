<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index($id = null)
    {
        if ($id) {
            $Product = Product::where('id', $id)->first();
        } else {
            $Product = Product::with('Orders')->get();
        }
        return response()->json($Product);
    }

    public function create(ProductCreateRequest $request)
    {
        //$Path = $request->file('image_path')->store('public/Product_image');

        $Product = Product::create($request->
            //merge(['image_path' => $Path])
            toArray());
        return response()->json($Product);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $Product = Product::where('id', $id)->update($request->toArray());
        return response()->json($Product);
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return response()->json('product deleted successfuly');
    }

    public function AddImage(Request $request, $id)
    {
        $Product = new Product();
        $Product->find($id)->addMedia($request->image)->toCollection();
        return response()->json('Uploaded successfully!');
    }
}
