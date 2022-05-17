<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\Country;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\ApplyCoupon;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ApplyShippingCharge;
use App\Http\Controllers\Controller;
use App\Mail\WellcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ShippingController extends Controller
{



    public function shippingDetails(){

        $cities =

        $countries = Country::where('status', 1)->get();

        $carts = Cart::where('user_id', auth()->user()->id)->get();

        $applyCoupon = ApplyCoupon::with('coupon')->where('user_id', auth()->user()->id)->first();
        $applyShippingCharge = ApplyShippingCharge::with('shippingCharge')->where('user_id', auth()->user()->id)->first();
        return view('frontend.shipping.shipping', compact('carts','applyCoupon','applyShippingCharge','countries'));
    }

    public function getCity(Request $request){
    //    return $request->countryId;

      $citis = City::where('country_id', $request->countryId)->get();

       $output = '<option value="">Select a City&hellip;</option>';
       foreach ($citis  as $city) {
         echo $output = '<option value="'.$city->id.'">'.$city->city_name.'</option>';
       }
    }


    public function order(Request $request){



        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'address' => 'required',
        ]);


        if($request->payment_method == "Cash On Delivery"){
             $shipping_id = Shipping::insertGetId([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'city' => $request->city,
                'address' => $request->address,
                'created_at' =>Carbon::now(),
            ]);

            $order_id = Order::insertGetId([
                'customer_id' => auth()->user()->id,
                'shipping_id' =>$shipping_id,
                'order_total' =>$request->grand_total,
                'created_at' =>Carbon::now(),
            ]);

            $cards = Cart::where('user_id', auth()->user()->id)->get();

            foreach($cards as $card){
                OrderDetails::insert([
                    'order_id' => $order_id,
                    'product_id' => $card->product_id,
                    'color_id' => $card->color_id,
                    'size_id' => $card->size_id ,
                    'sale_price' => $card->sale_price,
                    'product_price' => $card->price,
                    'product_quantity' => $card->quantity,
                    'created_at' =>Carbon::now(),
                ]);
            }

            Payment::insert([
                'order_id' => $order_id,
                'payment_type' => $request->payment_method,
                'created_at' =>Carbon::now(),
            ]);



            $card_deletes = Cart::where('user_id', auth()->user()->id)->get();

            foreach($card_deletes as $card_delete){
                $card_delete->delete();
            }


            $user_email = auth()->user()->email;


            Mail::to($user_email)->send(new WellcomeMail());




            return redirect(route('confirm.order'));







        }elseif($request->payment_method == "SSL"){

            echo "SSL";

        }elseif($request->payment_method == "PayPal"){
           echo "PayPal";
        }





    }


    public function confirm(){
        return view('frontend.confiramation.confirm');
    }


    public function emails(){
        return new WellcomeMail();
    }


}
