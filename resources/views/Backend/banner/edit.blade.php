@extends('layouts.backend_master')


@section('backend')

 

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Banner Form <small><a href="{{ route('banner.index') }}" class="btn btn-primary">Manage Banner</a></small></h2>
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

                        <form method="POST"  action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data" id="demo-form2"  class="form-horizontal form-label-left" >

                            @csrf

                            @method('PUT')

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Banner Title Top <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" name="banner_title_top" value="{{  $banner->banner_title_top }}"  required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Banner Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="last-name" name="banner_title" value="{{  $banner->banner_title }}" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="banner_description" class="col-form-label col-md-3 col-sm-3 label-align">Banner Description</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control" type="text" name="banner_description" value="{{  $banner->banner_description }}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label for="banner_description" class="col-form-label col-md-3 col-sm-3 label-align">Banner Image</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="uploadImage" class="form-control" type="file" name="banner_image" accept="/*">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="banner_description" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                <div class="col-md-6 col-sm-6 ">
                                 <img id="insertImage"src="{{ asset('storage/banner/'.$banner->banner_image )}}" alt="{{ $banner->banner_title }}" width="200px">
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


@section('backend_js')
   <script>
        let image_upload = document.getElementById('uploadImage');
        let image_insert = document.getElementById('insertImage');

    
        image_upload.addEventListener('change', function(){
            image_insert.src = window.URL.createObjectURL(image_upload.files[0]);
        });
   </script>

@endsection


