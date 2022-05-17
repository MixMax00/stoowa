<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ParentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ParentcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = ParentCategory::all();
        return view('Backend.parentcategory.create', compact('datas'));
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
            'parent_category_name' => 'required',
            'description' => 'required',
            'parent_cat_img' => 'required|mimes:png,jpg',
        ]);

        $slug = Str::slug($request->parent_category_name);

        if($request->hasFile('parent_cat_img')){
            $parent_cat_img_name = $request->file('parent_cat_img');
            $par_cat_ext = $parent_cat_img_name->getClientOriginalExtension();
            $par_cat_name = time().'.'.$par_cat_ext;
            $par_cat_url = public_path('storage/par_cat_img/');

            $parent_cat_img_name->move($par_cat_url,$par_cat_name);

        }

        $par_category = new ParentCategory();
        $par_category->parent_category_name = $request->parent_category_name;
        $par_category->description = $request->description;
        $par_category->parent_cat_img = $par_cat_name;
        $par_category->slug = $slug;
        $par_category->save();


        return back()->with('success','Parent Category Insert Successfuly');


      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParentCategory  $parentCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ParentCategory $parentCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParentCategory  $parentCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ParentCategory $parentCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParentCategory  $parentCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParentCategory $parentCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParentCategory  $parentCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParentCategory $parentCategory)
    {
        //
    }
}
