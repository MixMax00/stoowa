<?php

namespace App\Http\Controllers\Frontend;

use auth;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function shop(){

        $products = Product::where('status', 1)->orderBy("created_at", "DESC")->with('categories','colors','sizes')->select("id","product_title","short_description","product_image","slug","price","sale_price","quantity","status")->paginate(20);
      
        return view('frontend.shop.shop', compact('products'));
    }


    
    public function shopDetails($slug,$id){

        // return Cart::all();
        $cardData = null;
        $details_product = Product::with('categories','colors','sizes')->where('id',$id)->first();
        // return $details_product->id;

        if(isset(auth()->user()->id)){
            $cardData = Cart::where('user_id', auth()->user()->id)->where('product_id', $details_product->id)->first();
            // return $cardData->product_id;
        }


        // return auth()->user()->id;


      
        
      
        return view('frontend.category.shop-details', compact('details_product','cardData'));
    }



}
