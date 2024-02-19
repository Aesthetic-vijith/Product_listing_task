<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::where('main_category', true)->pluck('id');
        $brands = Brand::pluck('id');

        $products = [];
        for ($i = 1; $i <= 30; $i++) {
            $categoryId = $categories->random();
            $brandId = $brands->random();

            $products[] = [
                'product_name' => 'Product ' . $i,
                'product_code' => 'P00' . $i,
                'product_slug' => 'product-' . $i,
                'category_id' => $categoryId,
                'brand_id' => $brandId, 
                'product_original_price' => rand(10, 100),
                'product_has_discount' => rand(0, 1) ? true : false,
                'product_discount_price' => rand(10, 50),
                'product_quantity' => rand(1, 100),
                'product_image' => 'product-' . $i . '.jpg',
                'product_status' => 'active',
            ];
        }

        Product::insert($products);
    }
}


