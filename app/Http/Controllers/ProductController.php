<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeUnit\FunctionUnit;

class ProductController extends Controller
{
    
    public function store(StoreProductRequest $request)
    {
        if (!Auth::check()) {
            return response()->json(['message'=>'Please log in first'],403);
        }

        $shop_id = Auth::user()->shop->id;
        $validatedData = $request->validated();
        $validatedData['shop_id'] = $shop_id;

        $product =Product::create($validatedData);
        // return response()->json($product,201);
        return redirect('shopdashboard');
    }

    public function index()
    {
        $shop_id = Auth::user()->shop->id;
        $products = Product::where('shop_id',$shop_id)->get();

        return response()->json([$products]);

    }

    public function show($product_id)
    {

        $product = Product::findOrFail($product_id);

        return response()->json([$product]);

    }

    public function update(UpdateProductRequest $request,$product_id)
    {

        $product = Product::findOrFail($product_id);

        $vlidatedDate = $request->validated();

        $product->update($vlidatedDate);
        
        // return response()->json($product);
        return redirect('shopdashboard');

        
    }


    public function deactiveate($product_id)
    {
        $shop_id = Auth::user()->shop_id;
        $product = Product::findOrFail($product_id);
        
        $product->update(['isActive'=>false]);

        // return response()->json(['softdelete done',$product], 200);
        return redirect('shopdashboard');


 
    }


    public function destroy($product_id)
    {
        $shop_id = Auth::user()->shop_id;
        $product = Product::findOrFail($product_id);
        if($shop_id != $product->shop_id)
        {
            return response()->json(['message'=>'Unauthraized User'],403);
        }

        $product->delete();
        return response()->json([
            'message'=>'product deleted successfully'
        ],200);
    }

    public function addCategoryToProduct(Request $request,$product_id)
    {

    $request->validate([
        'category_id' => 'required|integer|exists:categories,id',
    ]);
    $product = Product::findOrFail($product_id);

    $product->categories()->attach($request->category_id);

    return response()->json(['message' => 'Category attached successfully','product' => $product,], 201);
    }

    public function showProductCategories($product_id)
    {
        $product = Product::findOrFail($product_id);
        $categories = $product->categories;
        return response()->json([$categories], 200);

    }

}
