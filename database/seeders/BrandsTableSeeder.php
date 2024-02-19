<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    public function run()
    {
        $brands = [
            ['brand_name' => 'Nike', 'status' => 'active'],
            ['brand_name' => 'Apple', 'status' => 'active'],
            ['brand_name' => 'Samsung', 'status' => 'active'],
            ['brand_name' => 'Toyota', 'status' => 'active'],
            ['brand_name' => 'Coca-Cola', 'status' => 'active'],
            ['brand_name' => 'Amazon', 'status' => 'active'],
            ['brand_name' => 'McDonald\'s', 'status' => 'active'],
            ['brand_name' => 'Disney', 'status' => 'active'],
            ['brand_name' => 'Adidas', 'status' => 'active'],
            ['brand_name' => 'Sony', 'status' => 'active'],
        ];

        Brand::insert($brands);
    }
}

