<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use App\Services\ShopService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    protected $service;

    public function __construct(ShopService $service)
    {
        $this->service = $service;
    }
    public function store(StoreShopRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect('shopdashboard');
        // return response()->json(['message'=>'shop crated','data'=>$shop],201);
    }

    public function index()
    {
        $shops = $this->service->index();
        return response()->json($shops, 200);
    }

    public function show($shop_id)
    {
        $shop = $this->service->show($shop_id);
        return response()->json([$shop]);
    }

    public function update(UpdateShopRequest $request)
    {
        $data = $request->validated();
        $shop = $this->service->update($data);
        return redirect()->route('shopdashboard')->with('message', 'Shop updated successfully');
    }


    public function destroy($shop_id)
    {
        $shop = Shop::findOrFail($shop_id);
        $shop->delete();
        return response()->json([
            'message' => 'shop deleted successfully'
        ], 200);
    }

}
