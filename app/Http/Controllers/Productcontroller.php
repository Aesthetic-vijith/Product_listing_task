<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function getCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function getBrands()
    {
        $brands = Brand::all();
        return response()->json($brands);
    }

    public function getProducts(Request $request)
    {
        $categoryIds = $request->input('categories');
        $brandIds = $request->input('brands');

        $query = Product::query();

        if ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        }

        if ($brandIds) {
            $query->whereIn('brand_id', $brandIds);
        }

        $products = $query->get();

        return response()->json($products);
    }
}