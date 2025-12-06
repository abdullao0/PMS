<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductService
{

    public function store($data)
    {
    if (!Auth::check()) {
        return response()->json(['message' => 'Please log in first'], 403);
    }

    $shop_id = Auth::user()->shop->id;
    $data['shop_id'] = $shop_id;

    // Create the product
    $product = Product::create($data);

    // Attach categories if they exist in the request
    if (isset($data['categories'])) {
        $product->categories()->attach($data['categories']);
    }
        
    }
    public function index()
    {
        $shop_id = Auth::user()->shop->id;
        $products = Product::where('shop_id',$shop_id)->get();
        return $products;
    }
    public function show($product_id)
    {
        $product = Product::findOrFail($product_id);
        return $product;
    }
    public function update($product_id,$data)
    {
    $product = Product::findOrFail($product_id);
        if(Auth::user()->shop->id != $product->shop_id || $product->isActive === 0)
            return response()->json(['The product that you are trying to edite is not yours or InActive'],403);
    $product->update($data);

    // Sync categories if they exist in the request
    if (isset($data['categories'])) {
        $product->categories()->sync($data['categories']);
    } else {
        // If no categories are selected, remove all categories
        $product->categories()->detach();
    }

    return $product;

    }
    public function deactiveate($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->update(['isActive'=>false]);

        return $product;
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
    }
    public function addCategoryToProduct($product_id,$data)
    {
        $product = Product::findOrFail($product_id);
        $product->categories()->attach($data);
        return $product;
    }
    public function showProductCategories($product_id)
    {
        $product = Product::findOrFail($product_id);
        $categories = $product->categories;
        return $categories;

    }
}
