<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_banners = Banner::all();
        $trashedBanner = Banner::onlyTrashed()->get();
        return view('Backend.banner.mangeBanner',[
            'all_banners' => $all_banners,
            'datas' =>$trashedBanner,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.banner.addBanner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
          'banner_title_top' => 'required',
          'banner_title' => 'required',
          'banner_description' => 'required',
          'price' => 'required',
          'banner_image' => 'required|image',
       ]);


       if($request->hasFile('banner_image')){
           $banner_image_name = $request->file('banner_image');
           $image_ext = $banner_image_name->getClientOriginalExtension();
           $new_image_name = time().'.'.$image_ext;
           $imageUrl = public_path()."/storage/banner/";
           $banner_image_name->move($imageUrl,$new_image_name);

       }
       $slug = Str::substr($request->banner_title, 2);
       $banners = new Banner();

       $banners->banner_title_top = $request->banner_title_top;
       $banners->banner_title = $request->banner_title;
       $banners->banner_description = $request->banner_description;
       $banners->price = $request->price;
       $banners->sele_price = $request->sele_price;
       $banners->banner_image = $new_image_name;
       $banners->slug = $slug;
       $banners->created_at = Carbon::now();
       $banners->save();

       return redirect(route('banner.create'))->with('success','Banner Image Insert Successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('Backend.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {

        $request->validate([
            'banner_title_top' => 'required',
            'banner_title' => 'required',
            'banner_description' => 'required',
            'banner_image' => 'required|image',
         ]);


         if($request->hasFile('banner_image')){
             $banner_image_name = $request->file('banner_image');

             if(!empty($banner_image_name)){
                $image_ext = $banner_image_name->getClientOriginalExtension();
                $new_image_name = time().'.'.$image_ext;
                $imageUrl = public_path()."/storage/banner/";
                $banner_image_name->move($imageUrl,$new_image_name);



                $img_exits = public_path('storage/banner/'.$banner->banner_image);
                if(file_exists($img_exits)){
                    unlink($img_exits);
                }
             }else{
                $new_image_name = $banner->banner_image;
             }

         }

         $banner->banner_title_top = $request->banner_title_top;
         $banner->banner_title = $request->banner_title;
         $banner->banner_description = $request->banner_description;
         $banner->banner_image = $new_image_name;
         $banner->created_at = Carbon::now();
         $banner->save();

         return redirect('banner')->with('success','Banner Image Insert Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        if($banner->banner_status == 1){
            $banner->banner_status = 2;
            $banner->save();

        }else{
           $banner->banner_status = 1;
           $banner->save();

        }

        return back()->with('success',' Deleted Successfully');

    }

    public function statusUpdate(Banner $banner){

       if($banner->banner_status == 1){
           $banner->banner_status = 2;
           $banner->save();
           return back()->with('success',' Status Update Successfully');
       }else{
          $banner->banner_status = 1;
          $banner->save();
          return back()->with('success',' Status Update Successfully');
       }



    }

    public function BannerRestore($id){
        $data = Banner::onlyTrashed()->find($id);
        $data->restore();
        if($data->banner_status == 1){
            $data->banner_status = 2;
            $data->save();

        }else{
           $data->banner_status = 1;
           $data->save();
        }
        return back()->with('success',' Banner Restore  Successfully');


    }

    public function parmanentDelete($id){
        $data = Banner::onlyTrashed()->find($id);
        $data->forceDelete();
        return back()->with('success',' Banner Delete  Successfully');
    }


}
