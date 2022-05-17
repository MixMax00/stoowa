<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Http\Controllers\Controller;
use App\Models\Banner;

class FrontenController extends Controller
{
    public function frontEnd(){
        $banners =  Banner::where('banner_status',1)->get();
        $products = Product::all();
        return view('frontend.home', compact('products','banners'));
    }


    public function autocomplete(Request $request){
         return "Hi";
    }

    public function bannerDetails($id){
        $details_banner = Banner::where('id',$id)->first();
        return view('frontend.banner.banner-details', compact('details_banner'));
    }



}
