<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendUserController extends Controller
{

 
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('frontend.dashboard.index');
    }

    public function register(){
        return view('frontend.dashboard.userregister');
    }
}
