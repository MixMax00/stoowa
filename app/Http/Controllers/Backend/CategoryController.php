<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ParentCategory;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Category::all();
        $par_cat = ParentCategory::all();
        return view('Backend.category.index', compact('datas','par_cat'));
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
            'category_name' => 'required'
        ]);

        $slug = Str::slug($request->category_name);

        if($request->hasFile('cat_img')){
            $cat_img = $request->file('cat_img');
            $cat_img_ext = $cat_img->getClientOriginalExtension();
            $cat_img_name = time().'.'.$cat_img_ext;
            $cat_img_url = public_path('storage/category/');
            $img_upload = $cat_img->move($cat_img_url,$cat_img_name);
        }

       if($img_upload){
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->par_cat_id = $request->par_cat_id;
        $category->description = $request->description;
        $category->cat_img = $cat_img_name;
        $category->slug = $slug;
        $category->save();
       }


        return back()->with('success','Category Insert Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       $par_cat = ParentCategory::all();
        return view('Backend.category.edit', compact('category','par_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'category_name' => 'required'
        ]);

        $slug = Str::slug($request->category_name);

        if($request->hasFile('cat_img')){
            $cat_img = $request->file('cat_img');
            if(!empty($cat_img)){
                $cat_img_ext = $cat_img->getClientOriginalExtension();
                $cat_img_name = time().'.'.$cat_img_ext;
                $cat_img_url = public_path('storage/category/');
                $img_upload = $cat_img->move($cat_img_url,$cat_img_name);

                $img_exts = public_path('storage/category/'.$category->cat_img);

                if(file_exists($img_exts)){
                    unlink($img_exts);
                }

            
            }else{
                $cat_img_name = $category->cat_img;
            }
        }
           
        $category->category_name = $request->category_name;
        $category->par_cat_id = $request->par_cat_id;
        $category->description = $request->description;
        $category->cat_img = $cat_img_name;
        $category->slug = $slug;
        $category->save();
        


        return back()->with('success','Category Update Successfully');
        


        
    }



    public function categoryStatus(Category $category){
        if($category->status == 1){
            $category->status = 2;
            $category->save();
            return back()->with('success', 'Category Deactive Successfuly');
        }else{
            $category->status = 1;
            $category->save();
            return back()->with('success', 'Category Deactive Successfuly');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        if($category->status == 1){
            $category->status = 2;
            $category->save();
           
        }else{
            $category->status = 1;
            $category->save();
            
        }
        return back()->with('success', 'Category Delete Successfuly');

    }


    public function deletedCategory($id){
       $deletedCategory = Category::onlyTrashed()->find($id);

       return view('Backend.category.index','deletedCategory');
    }
}
