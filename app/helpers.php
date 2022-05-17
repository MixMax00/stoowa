<?php

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;

 function categories(){
     $product_category = Category::all();

     return $product_category;
  }



  function cartItem(){
    $cart_data = null;
  
    if (isset(auth()->user()->id)) {
      $cart_data = Cart::where('user_id', auth()->user()->id)->with('product')->get();
      
    }
    
    return $cart_data;
    
  }


?>