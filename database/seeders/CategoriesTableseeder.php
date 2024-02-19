<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $mainCategories = [
            ['category_name' => 'Electronics', 'main_category' => true, 'status' => 'active'],
            ['category_name' => 'Apparel', 'main_category' => true, 'status' => 'active'],
        ];
    
        $subCategories = [
            ['category_name' => 'Smartphones', 'main_category' => false, 'status' => 'active'],
            ['category_name' => 'Laptops', 'main_category' => false, 'status' => 'active'],
            ['category_name' => 'T-Shirts', 'main_category' => false, 'status' => 'active'],
            ['category_name' => 'Headphones', 'main_category' => false, 'status' => 'active'],
            ['category_name' => 'Jeans', 'main_category' => false, 'status' => 'active'],
        ];

        Category::insert(array_merge($mainCategories, $subCategories));
    }
}
