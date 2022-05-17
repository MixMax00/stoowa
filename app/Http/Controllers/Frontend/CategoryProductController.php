<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function Show($id){

       $products = Product::where('product_id', $id)->where('status', 1)->get();

       return view('frontend.category.categoryporduct', compact('products'));
    }
}
