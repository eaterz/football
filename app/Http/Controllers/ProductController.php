<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController
{

    public function index()
    {
        $categories = Category::all();
        return view('welcome',compact('categories'));
    }

    public function show($name)
    {
        $category = Category::where('name',$name)->get();
        $products = Product::where('category_id',$category[0]->id)->get();

        return view('product', compact('products'));
    }
}
