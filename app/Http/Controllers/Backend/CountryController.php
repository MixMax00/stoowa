<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index(){
        $datas = Country::all();
        return view('Backend.country.index', compact('datas'));
    }


    public function store(Request $request){
        $this->validate($request, [
            'country_name' => 'required',
        ]);

        Country::insert([
            'country_name' => $request->country_name,
        ]);

        return back()->with('success', 'Country Add Successfull !');
    }
}
