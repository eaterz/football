<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController
{

    public function index()
    {

        $products = Product::all();
        return view('admin.dashboard',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'category' => 'required|exists:categories,id',
            'price' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category');
        $product->price = $request->input('price');
        $product->save();

        return redirect('/dashboard');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        $categories = Category::all();
        return view('admin.edit',compact('product','categories'));
    }
    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);


        $product=Product::find($id);
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category');
        $product->price = $request->input('price');
        $product->save();
        return redirect('/dashboard');
    }

    public function destroy($id)
    {

        $product=Product::find($id);

        if($product){
            $product->delete();
        }

        return redirect('/dashboard');
    }
}
