<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Cupon;
use App\Models\ApplyCoupon;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use Illuminate\Support\Carbon;
use App\Models\ApplyShippingCharge;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ShippingChargeController;

class CartController extends Controller
{
    public function AddCard(Request $request){

        // $this->validate($request, [
        //     'size_id' => 'required',
        //     'color_id' => 'required',
        //     'quantity' => 'required|integer',
        //     'price' => 'required|integer',
        //     'total_price' => 'required|integer',
        // ]);


       if(!auth()->user()->id){
            return redirect('/user/register');
       }

      if(isset(auth()->user()->id)){
        $carts = new Cart();
        $carts->product_id = $request->product_id;
        $carts->user_id = auth()->user()->id;
        $carts->size_id = $request->size;
        $carts->color_id = $request->color;
        $carts->quantity = $request->quantity;
        $carts->sale_price = $request->sale_price;
        $carts->price = $request->price;
        $carts->total_price = $request->total_price;
        $carts->save();
 
        return redirect(route('view.card'))->with('success', "Cart Add Product Successfully !");
 
      }
       
    }

    public function viewcard(){

        $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();

        $applyCoupon = ApplyCoupon::with('coupon')->where('user_id', auth()->user()->id)->first();
        $applyShippingCharge = ApplyShippingCharge::with('shippingCharge')->where('user_id', auth()->user()->id)->first();

        $shippingCharge = ShippingCharge::where('status', 0)->get();

        return view('frontend.cart.viewcart', compact('carts','applyCoupon','shippingCharge','applyShippingCharge'));
    }



    public function delete($id){
       $cards = Cart::find($id);
       $cards->delete();

       return back();
    }


    public function applyCoupon(Request $request){

     $this->validate($request, [
        'coupon' => 'required',
     ]);


     $coupon_id = Cupon::where('name', $request->coupon)->whereDate('expried_date', '>', Carbon::today()->toDateString())->first();
     


     if($coupon_id){
        $coupon = new ApplyCoupon();
        $coupon->user_id = Auth()->user()->id;
        $coupon->coupon_id = $coupon_id->id;
        $coupon->use_date	 = Carbon::now();        
        $coupon->save();
        return back()->with('success', 'Coupon Applye Successfull !');        

     }else{
      return back()->with('message', 'Coupon Expried !');
     }

     



    }


    public function shippingCharge(Request $request){
       $this->validate($request, [
         'shipping_charge' => 'required',
       ]);


       $applyChargeShipping = ShippingCharge::where('id', $request->shipping_charge)->first();

       $applyCharge = new ApplyShippingCharge();

       $applyCharge->user_id = Auth()->user()->id;
       $applyCharge->shipping_charge_id = $applyChargeShipping->id;
       $applyCharge->shipping_charge = $applyChargeShipping->delivery_charge;
       $applyCharge->save();

       return back();



       
    }

    public function shippingChargeUpdate(Request $request, $id){

    

      $shipping_charge_update = ApplyShippingCharge::find($id);
      $applyChargeShipping = ShippingCharge::where('id', $request->shipping_charge)->first();
   

      $shipping_charge_update->shipping_charge_id = $request->shipping_charge;
      $shipping_charge_update->shipping_charge = $applyChargeShipping->delivery_charge;
      $shipping_charge_update->save();
      return back();
      

    }



    public function CardUpdate(Request $request){
         
      //  $this->validate($request, [
      //     'quantity' => 'required',
      //     'price' => 'required',
      //  ]);


       $total_price = $request->quantity * $request->price;

     


       Cart::where('id', $request->id)
       ->update([
         'quantity' => $request->quantity,
         'price' => $request->price,
         'total_price' => $total_price,
        ]);


        return back();

    }
}

