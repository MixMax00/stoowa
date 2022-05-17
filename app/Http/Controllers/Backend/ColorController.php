<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Color::all();
        return view('Backend.color.index', compact('datas'));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'color_name' => 'required|unique:colors',
        ]);
        $color_name = Str::upper($request->color_name);
        $slug = Str::slug($request->color_name);

        $colors = new Color();
        $colors->color_name = $color_name;
        $colors->slug = $slug;
        $colors->save();

        return back()->with('success','Color Insert Successfully');
    }

    public function colorStatus(Color $color){
       if($color->status == 1){
           $color->status = 2;
           $color->save();
           return back()->with('success','Color Status Update');
       }else{
           $color->status = 1;
           $color->save();
           return back()->with('success','Color Status Update');
       }
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('Backend.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $this->validate($request, [
            'color_name' => 'required|unique:colors',
        ]);
        $color_name = Str::upper($request->color_name);
        $slug = Str::slug($request->color_name);

        $color->color_name = $color_name;
        $color->slug = $slug;
        $color->save();

        return redirect('/backend/color')->with('success','Color Insert Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        //
    }
}
