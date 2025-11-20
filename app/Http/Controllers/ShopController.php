<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function store(StoreShopRequest $request)
    {
        // this is to check if the user has token(loged in)
        if (!Auth::check()) {
            return response()->json(['message'=>'Please log in first'],403);
        }
        $user_id = Auth::user()->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $user_id;
        if ($request->hasFile('logo'))
            $validatedData['logo'] = $request->file('logo')->store('logo','public');

        $shop = Shop::create($validatedData);
        return redirect('shopdashboard');
        // return response()->json(['message'=>'shop crated','data'=>$shop],201);

    }

    public function index()
    {
        $shops = Shop::all();
        return response()->json([$shops]);
    }

    public function show($shop_id)
    {

        $user_id = Auth::user()->id;
        if ($user_id != $shop_id)
        {
            return response()->json(['message' => 'Unauthraized User'], 403);
        }

        $shop = Shop::where('id',$shop_id)->firstOrFail();

        return response()->json([$shop]);


    }

    public function update(UpdateProductRequest $request,$shop_id)
    {
        $user_id = Auth::user()->id;
        if ($user_id != $shop_id)
        {
            return response()->json(['message' => 'Unauthraized User'], 403);
        }

        $shop = Shop::where('id',$shop_id)->firstOrFail();

        $validatedData = $request->validated();

        $shop->update($validatedData);

        // return response()->json(['message'=>'product updated','data'=>$shop]);
        return redirect('shopdashboard');


    }

    public function destroy($shop_id)
    {
        $shop = Shop::findOrFail($shop_id);
        $user = User::findOrFail($shop_id);
        $shop->delete();
        $user->delete();
        return response()->json([
            'message'=>'shop and user deleted successfully'
        ],200);
    }
    
}
