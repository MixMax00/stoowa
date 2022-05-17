<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductGallery;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy("created_at", "DESC")->with('categories','colors','sizes')->select("id","product_title","product_image","slug","price","sale_price","quantity","status")->get();
        return view('Backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::where('status',1)->latest()->get();
        $colors = Color::all();
        $sizes = Size::all();
        return view('Backend.product.create', compact('categories','colors','sizes'));
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
            // 'product_title' =>'required',
            // 'price' => 'required|numeric',
            // 'sale_price' =>'required|numeric',
            // 'quantity' =>'required|numeric',
            // 'short_description' => 'required|max:150',
            // 'product_iamge' => 'required|Image|mimes:jpg,bmp,png',
        ]);

        

        $slug = Str::slug($request->product_title);
        $sku = Str::upper(Str::substr($request->product_title, 0, 3)."-".Str::random());

        if($request->hasFile('product_image')){
            $image_name = $request->file('product_image');
            $image_ext = $image_name->getClientOriginalExtension();
            $new_image_name = $slug."-".time().".".$image_ext;
            $product_image_url = public_path('storage/product/');

            $uploads = $image_name->move($product_image_url, $new_image_name);

            if($uploads){
                $products = new Product();
                $products->product_title = $request->product_title;
                $products->user_id = Auth::user()->id;
                $products->slug = $slug;
                $products->sku = $sku;
                $products->short_description = $request->short_description;
                $products->price = $request->price;
                $products->sale_price = $request->sale_price;
                $products->quantity = $request->quantity;
                $products->description = $request->description;
                $products->add_info = $request->add_info;
                $products->product_image = $new_image_name;
                $products->save();

                $products->categories()->attach($request->categories);
                $products->sizes()->attach($request->sizes);
                $products->colors()->attach($request->colors);
            }

        }

        if($products){
            if($request->hasFile('gallery')){
                $gallery = $request->file('gallery');
                foreach($gallery as $gall){
                    $gallery_image = $slug."-".uniqid().".".$gall->getClientOriginalExtension();
                    $gallery_image_url = public_path('storage/product-description/');

                    $gallery_uploads = $gall->move($gallery_image_url, $gallery_image);

                    if($gallery_uploads){
                        $galleyProduct = new ProductGallery();
                        $galleyProduct->product_id = $products->id;
                        $galleyProduct->image = $gallery_image;
                        $galleyProduct->save();

                    }
                    
                }
            }
        }


        return redirect('/backend/product')->with('success',"Product Insert Successfully Done!");



       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        
        $categories = Category::where('status',1)->latest()->get();
        $colors = Color::all();
        $sizes = Size::all();
        $galleres = ProductGallery::where('product_id', $product->id)->get();
        return view('Backend.product.edit' , compact('product','categories','colors','sizes','galleres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        
        $slug = Str::slug($request->product_title);
        $sku = Str::upper(Str::substr($request->product_title, 0, 3)."-".Str::random());



        if($request->hasFile('product_image')){
            $product_img_name = $request->file('product_image');
            if(!empty($product_img_name)){
            $product_img_ext = $product_img_name->getClientOriginalExtension();
            $product_new_img = Str::slug($request->product_title)."_".time().".".$product_img_ext;

            $updateUrl = public_path('storage/product/');

            $exts_img = public_path('storage/product/'.$product->product_image);

                if(file_exists($exts_img)){
                unlink($exts_img);
                }else{
                session()->put('success', "Dose Not Match Privious Image File");
                }


            $updateUploads = $product_img_name->move($updateUrl, $product_new_img);
    
            }else{
               
                $product_img_name = $product->product_image;
            }
        }
        

     
        $product->product_title = $request->product_title;
        $product->user_id = Auth::user()->id;
        $product->slug = $slug;
        $product->sku = $sku;
        $product->short_description = $request->short_description;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->add_info = $request->add_info;
        $product->product_image = $product_new_img;
        $product->save();

        $product->categories()->sync($request->categories);
        $product->sizes()->sync($request->sizes);
        $product->colors()->sync($request->colors);





        if($product){
            if($request->hasFile('gallery')){
                $updateGallery = $request->file('gallery');
                if(!empty($updateGallery)){
                    foreach($updateGallery as $upGall){
                        $gallery_image_name = $slug."-".uniqid().".".$upGall->getClientOriginalExtension();
                        $gallery_image_url = public_path('storage/product-description/');

                       
                        // $gallery_uploads = $upGall->move($gallery_image_url, $gallery_image_name);
    
                       
                        // $product->product->id = $product->id;
                        // $product->image = $gallery_image_name;
                        // $product->save();
                        
                    }
                }
                
            }
        }



     

    }


    public function statusUpdate(Product $product){
      
        if($product->status == 1){
            $product->status = 2;
            $product->save();
            return back()->with('success',' Status Update Successfully');
        }else{
           $product->status = 1;
           $product->save();
           return back()->with('success',' Status Update Successfully');
        }
 
       
 
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
    }
}
