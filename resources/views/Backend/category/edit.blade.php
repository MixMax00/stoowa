@extends('layouts.backend_master')

@section('title')
  Category
@endsection



@section('backend')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Banner Form <span><a href="" class="btn btn-primary btn-sm">View Category</a></span> </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="#">Settings 1</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form method="POST" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                @csrf

                                @method('PUT')
    
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Category Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 ">
                                        <input type="text" id="first-name" name="category_name" value="{{ $category->category_name }}" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Parent Category Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 ">
                                       <select name="par_cat_id" id="" class="form-control">
                                           {{-- <option value="{{ $par_cat->par_cat_id }}" >{{ $par_cat->parent_category_name }}</option> --}}

                                           @foreach ($par_cat as $parCat)
                                             <option value="{{ $parCat->par_cat_id }}">{{ $parCat->parent_category_name }}</option>
                                           @endforeach
                                          
                                       </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Description<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 ">
                                        <textarea id="first-name" name="description" required="required" class="form-control ">{{ $category->description }}</textarea>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Category Image<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 ">
                                        <input type="file" id="first-name" name="cat_img" required="required" class="form-control ">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    
                                    <div class="col-md-6 col-sm-6 offset-4">
                                        <img width="100" src="{{ asset('storage/category/'.$category->cat_img) }}">
                                    </div>
                                </div>
                               
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
    
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>


@endsection