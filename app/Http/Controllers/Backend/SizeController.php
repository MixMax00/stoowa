<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Size::all();
        $trashedData = Size::onlyTrashed()->get();
        return view('Backend.size.index', compact('datas','trashedData'));
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
            'size_name' => 'required||unique:sizes',
        ]);
        $size_name = Str::upper($request->size_name);
        $slug = Str::slug($request->size_name);

        $sizes = new Size();
        $sizes->size_name = $size_name;
        $sizes->slug = $slug;
        $sizes->save();

        return back()->with('success','Size Insert Successfully');

    }



    public function sizeStatus(Size $size){
        if($size->status == 1){
            $size->status = 2;
            $size->save();
            return back()->with('success','Size Update Successfully');
        }else{
            $size->status == 1;
            $size->save();
            return back()->with('success','Size Update Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('Backend.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $this->validate($request, [
            'size_name' => 'required||unique:sizes',
        ]);

        $size_name = Str::upper($request->size_name);
        $slug = Str::slug($request->size_name);

        $size->size_name = $size_name;
        $size->slug = $slug;
        $size->save();

        return redirect('backend/size')->with('success','Size Edit Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        if($size->status == 1){
            $size->status = 2;
            $size->save();
            return back()->with('success','Delete Successfully');
        }else{
            $size->status = 1;
            $size->save();
            return back()->with('success','Delete Successfully');
        }
    }

    public function sizeRestore($id){
        $trashedData = Size::onlyTrashed()->find($id);

        $trashedData->restore();

        if($trashedData->status == 1){
            $trashedData->status = 2;
            $trashedData->save();
            return back()->with('success','Restore Successfully');
        }else{
            $trashedData->status = 1;
            $trashedData->save();
            return back()->with('success','Restore Successfully');
        }
    }

    public function parmanentDelete($id){
        $parId = Size::onlyTrashed()->find($id);

        $parId->forceDelete();
        return back()->with('success','Size Delete  Successfully');

        
    }
}
