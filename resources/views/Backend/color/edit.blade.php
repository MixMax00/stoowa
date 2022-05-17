@extends('layouts.backend_master')

@section('title')
  Edit Color
@endsection



@section('backend')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Color Table Form </h2>
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
                            <form method="POST" action="{{ route('color.update', $color->id)}}" enctype="multipart/form-data" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                @csrf

                                @method('PUT')
    
                                <div class="item form-group">
                                    <label class="col-form-label col-md-5 col-sm-3 label-align" for="first-name">Color Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 ">
                                        <input type="text" id="first-name" value="{{ $color->color_name }}" name="color_name" required="required" class="form-control ">
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








    @if(Session('success'))


            
        <div class="toast toastShow" style="position: absolute; top: 0; right: 0;">
            <div class="toast-header">
              <strong class="mr-auto">{{ config('app.name') }}</strong>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
              <p>{{ Session('success') }}</p>
            </div>
          </div>


    @endif
      


@endsection




@section('backend_js')


        <script>
            $('.toastShow').toast('show');
        </script>

@endsection