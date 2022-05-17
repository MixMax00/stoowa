<?php

namespace App\Http\Controllers;

use App\Models\ShippingCharge;
use Illuminate\Http\Request;

class ShippingChargeController extends Controller
{
    




    public function index(){

        $datas = ShippingCharge::all();
        return view('Backend.ShippingCharge.index', compact('datas'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'shipping_charge_name' => 'required',
            'delivery_charge' => 'required',
        ]);


        $shipping_charge = new ShippingCharge();
        $shipping_charge->shipping_charge_name = $request->shipping_charge_name;
        $shipping_charge->delivery_charge = $request->delivery_charge;
        $shipping_charge->save();

        return back()->with('success', 'Shipping Insert Successfull');

    }
}
