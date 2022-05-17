<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index(){

        $countries = Country::where('status', 1)->get();
        $datas = City::all();
        return view('Backend.city.index', compact('datas','countries'));
    }


    public function store(Request $request){
        $this->validate($request, [
            'city_name' => 'required',
            'country_id' => 'required',
        ]);

        City::insert([
            'city_name' => $request->city_name,
            'country_id' => $request->country_id,
        ]);

        return back()->with('success', 'City Add Successfull !');
    }

   
}
