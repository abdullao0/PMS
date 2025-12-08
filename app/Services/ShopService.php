<?php

namespace App\Services;

use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ShopService
{
    public function store($data)
    {
        if (!Auth::check()) 
        {
            return response()->json(['message'=>'Please log in first'],403);
        }
        $user_id = Auth::user()->id;
        $data['user_id'] = $user_id;
        $shop = Shop::create($data);
        return $shop;        
    }
    public function index()
    {
        $shops = Shop::all();
        return $shops;
    }
    public function show($shop_id)
    {
        $user_id = Auth::user()->id;
            if ($user_id != $shop_id)
            {
                return response()->json(['message' => 'Unauthraized User'], 403);
            }

        $shop = Shop::where('id',$shop_id)->firstOrFail();
        return $shop;


    }
    public function update($data)
    {
        $shop = Auth::user()->shop;

        if (!$shop)
        {
            return redirect()->back()->with('error', 'Shop not found.');
        }

        $shop->update($data);
        return $shop;
    }
}
