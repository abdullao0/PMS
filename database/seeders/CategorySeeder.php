<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
        {
        $categories = [
        'Groceries',
        'Beverages',
        'Snacks',
        'Personal Care',
        'Household Supplies',
        'Cleaning Products',
        'Baby Products',
        'Health & Wellness',
        'Electronics',
        'Mobile Accessories',
        'Home Appliances',
        'Kitchenware',
        'Stationery',
        'Office Supplies',
        'Clothing',
        'Footwear',
        'Bags & Accessories',
        'Hair Care',
        'Skincare',
        'Fragrances',
        'Toys',
        'Pet Supplies',
        'Hardware',
        'Tools & Repair',
        'Home Decor',
        'Bathroom Essentials',
        'Laundry Supplies',
        'Sports Items',
        ];
        foreach ($categories as $category) 
        {
        Category::create(['name' => $category]);
        }
    }
}
