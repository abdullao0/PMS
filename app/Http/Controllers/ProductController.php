<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryToProdcutRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeUnit\FunctionUnit;


class ProductController extends Controller
{
    protected $service;
    public function __construct(ProductService $service )
    {
        $this->service = $service;
    }
    public function store(StoreProductRequest $request)
    {
        $data = $request->Validated();
        $this->service->store($data);

        return redirect()->route('shopdashboard')->with('message', 'Product added successfully');
    }


    public function index()
    {

       $products = $this->service->index();

        return response()->json([$products]);
    }

    public function show($product_id)
    {
        $product = $this->service->show($product_id);
        return response()->json([$product]);
    }

    // public function update(UpdateProductRequest $request,$product_id)
    // {

    //     $product = Product::findOrFail($product_id);

    //     $vlidatedDate = $request->validated();

    //     $product->update($vlidatedDate);
        
    //     // return response()->json($product);
    //     return redirect('shopdashboard');

        
    // }



    public function update(UpdateProductRequest $request, $product_id)
{
    $data = $request->validated();
    $this->service->update($product_id,$data);

    return redirect()->route('shopdashboard')->with('message', 'Product updated successfully');
}


    public function deactiveate($product_id)
    {
        $this->service->deactiveate($product_id);
        // return response()->json(['softdelete done',$product], 200);
        return redirect('shopdashboard');
    }


    public function destroy($product_id)
    {
        $this->service->destroy($product_id);
        
        return response()->json([
            'message'=>'product deleted successfully'
        ],200);
    }

    public function addCategoryToProduct(AddCategoryToProdcutRequest $request,$product_id)
    {

    $data = $request->validated();
    $product = $this->service->addCategoryToProduct($product_id,$data);

    return response()->json(['message' => 'Category attached successfully','product' => $product,], 201);
    }

    public function showProductCategories($product_id)
    {
        $categories = $this->showProductCategories($product_id);
        return response()->json([$categories], 200);

    }

}
