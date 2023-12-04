<?php

namespace App\Http\Controllers\Products;


use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;


class ProductCreateController extends Controller
{
    public function create(Request $request)
    {
        $categories = Category::all();
        
        return View('products.create-product', compact('categories'));
    }

    public function store(Request $request)
    {
        $categories = Category::all();

        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'rating',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'category_id' => 'required',
                'date_publish',
            ]);
    
            $product = new Product;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->rating = $request->rating;
            $product->category_id = $request->category_id;
            $product->date_publish = now();
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/products'), $imageName);
                $product->image_product = '/images/products/'.$imageName;
            }
    
            $product->save();
    
            return view('products.create-product', compact('categories'));
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage(); 
            return view('products.create-product', compact('categories', 'errorMessage'));
        }     
    }
}