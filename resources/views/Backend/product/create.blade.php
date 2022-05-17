@extends('layouts.backend_master')

@section('title')
   Add Product
@endsection



@section('backend')


@can('add products')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Product Add Table Form   </h2>  <span> <a class="btn btn-primary" href="{{ route('product.index') }}">Product</a></span>
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
                        <form method="POST" action="{{ route('product.store')}}" enctype="multipart/form-data" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Product Title<span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-6 ">
                                            <input type="text" id="first-name" name="product_title" value="{{ old('product_title') }}" required="required" class="form-control ">
                                            @error('product_title')
                                                <p class="text-danger mb-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Category
                                        </label>
                                        <div class="col-md-8 col-sm-6 ">
                                           <select name="categories[]" id=""  class="form-control select-multiple" multiple="multiple">
                                              
                                               @foreach ($categories as $category)
                                                   <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                               @endforeach

                                               @error('categories')
                                                 <p class="text-dangermt-3">{{ $message }}</p>
                                                @enderror
                                           </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row  mb-3">
                                <div class="col-md-6">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Size
                                        </label>
                                        <div class="col-md-8 col-sm-6 ">
                                           <select name="sizes[]" id=""  class="form-control select-multiple" multiple="multiple">
            
                                               @foreach ($sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                                @endforeach


                                                @error('sizes')
                                                 <p class="text-dangermt-3">{{ $message }}</p>
                                                @enderror
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Color
                                        </label>
                                        <div class="col-md-8 col-sm-6 ">
                                           <select name="colors[]" id="" class="form-control select-multiple" multiple="multiple">
                                            
                                               @foreach ($colors as $color)
                                                  <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                               @endforeach

                                               @error('colors')
                                                 <p class="text-dangermt-3">{{ $message }}</p>
                                               @enderror
                                           </select>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Price<span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-6 ">
                                            <input type="number" id="first-name" name="price" required="required" class="form-control ">
                                            @error('price')
                                              <p class="text-dangermt-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Sale Price
                                        </label>
                                        <div class="col-md-8 col-sm-6 ">
                                          <input type="number" name="sale_price" class="form-control">
                                          @error('sale_price')
                                            <p class="text-danger mb-3">{{ $message }}</p>
                                          @enderror
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-2 col-sm-3 label-align" for="first-name">Quantity<span class="required">*</span>
                                        </label>
                                        <div class="col-md-10 col-sm-6 ">
                                            <input type="text" id="first-name" name="quantity" required="required" class="form-control ">
                                            @error('quantity')
                                              <p class="text-danger mt-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Product Image<span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-6 ">
                                            <input type="file" name="product_image" class="form-control">
                                            <p class="text-primary mt-3">Image Must be 800*609 px.</p>
                                            @error('product_image')
                                              <p class="text-danger mt-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Gallery Image
                                        </label>
                                        <div class="col-md-8 col-sm-6 ">
                                            <input type="file" name="gallery[]" class="form-control" multiple>
                                            <p class="text-primary mt-3">Image Must be 800*609 px.</p>
                                            @error('gallery')
                                              <p class="text-danger mt-3">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                            


                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-2 col-sm-3 label-align" for="first-name">Short Description<span class="required">*</span>
                                        </label>
                                        <div class="col-md-10 col-sm-6 ">
                                            <textarea id="first-name" name="short_description" class="form-control " rows="2"></textarea>
                                            @error('short_description')
                                            <p class="text-danger mt-3">{{ $message }}</p>
                                          @enderror
                                        </div>
                                    </div>
                                </div>

                              
                               
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-2 col-sm-3 label-align" for="first-name">Description
                                        </label>
                                        <div class="col-md-10 col-sm-6 ">
                                            <textarea id="first-name" name="description" class="form-control summernote" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-2 col-sm-3 label-align" for="first-name">Add Info
                                        </label>
                                        <div class="col-md-10 col-sm-6 ">
                                            <textarea id="first-name" name="add_info" class="form-control summernote" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                           

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-5">
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
@endcan

@endsection


@section('backend_css')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection




@section('backend_js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js" integrity="sha512-ZESy0bnJYbtgTNGlAD+C2hIZCt4jKGF41T5jZnIXy4oP8CQqcrBGWyxNP16z70z/5Xy6TS/nUZ026WmvOcjNIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



        <script>




            $(document).ready(function() {
                $('.summernote').summernote({
                    height: 120,
                    toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });

                $('.select-multiple').select2();
            });
    

        </script>

@endsection