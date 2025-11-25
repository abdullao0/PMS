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
        'Baby Products',
        'Health & Wellness',
        'Electronics',
        'Office Supplies',
        'Clothing',
        'Footwear',
        'Fragrances',
        'Toys',
        'Tools & Repair',
        'Sports Items',
        'Other'
        ];
        foreach ($categories as $category) 
        {
        Category::create(['name' => $category]);
        }
    }
}
