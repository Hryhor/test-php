<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Product;

class ProductGetController extends Controller
{
    public function index(Request $request)
    {   
        $category = $request->input('category');
        $query = Product::with('category');

        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
    
            $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();
    
            return view('products.get-products', compact('products'));
        } 
        if ($category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('id', $category);
            });
        }else {
            $products = Product::with('category')->get();

            return view('products.get-products', compact('products'));
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.get-product', compact('product'));
    }


}
