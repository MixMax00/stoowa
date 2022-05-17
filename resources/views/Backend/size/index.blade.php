@extends('layouts.backend_master')

@section('title')
  Size
@endsection



@section('backend')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Size Table Form </h2>
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
                            <form method="POST" action="{{ route('size.store')}}" enctype="multipart/form-data" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                @csrf
    
                                <div class="item form-group">
                                    <label class="col-form-label col-md-5 col-sm-3 label-align" for="first-name">Size Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-6 ">
                                        <input type="text" id="first-name" name="size_name" required="required" class="form-control ">
                                        @error('size_name')
                                            <p class="text-danger mt-2">{{  $message }}</p>
                                        @enderror
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
                <div class="col-md-7">

                    <div class="x_panel">
                        <div class="x_title">
                          <h2>Size Table</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Settings 1</a>
                                  <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
        
                          <table class="table">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Size Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
        
        
                              @forelse ($datas as $data)
        
                              <tr>
                                  <td>{{ $loop->index +1 }}</td> 
                                  <td>{{ $data->size_name }}</td>
                                  <td>{{ $data->slug }}</td>
                                  <td>{{ $data->status == 1 ? 'Active' : 'Deactive'  }}</td>
                                  <td>
        
                                      <a href="{{ route('size.status', $data->id) }}" class="btn btn-{{ $data->status == 1 ? 'warning' : 'primary' }} btn-sm">{{ $data->status == 1 ? 'Deactive' : 'Active' }}</a>
                                      <a href="{{ route('size.edit', $data->id) }}" class="btn btn-info btn-sm">Edit</a>

                                      <form action="{{ route('size.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                      </form>
                                     
                                  </td>
                              </tr>
                                  
                              @empty

                               <tr>
                                    <td class="text-center text-danger" colspan="10">No data Yet</td>
                               </tr>
                                  
                              @endforelse
                            </tbody>
                          </table>
        
                        </div>
                      </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">

                    <div class="x_panel">
                        <div class="x_title">
                          <h2>Delete Size Table</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Settings 1</a>
                                  <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
        
                          <table class="table">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Size Name</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
        
        
                              @forelse ($trashedData as $data)
        
                              <tr>
                                  <td>{{ $loop->index +1 }}</td>
                                  <td>{{ $data->size_name }}</td>
                                  <td>{{ $data->status == 1 ? 'Active' : 'Deactive'  }}</td>
                                  <td>
        
                                    
                                      <a href="{{ route('size.restore', $data->id) }}" class="btn btn-info btn-sm">Restore</a>
                                      <button type="submit" value="{{ route('size.parmanentdelete', $data->id) }}" class="parmanentDelete btn btn-danger btn-sm">Parmanent Delete</button>

                                      
                                     
                                  </td>
                              </tr>
                                  
                              @empty

                               <tr>
                                    <td class="text-center text-danger" colspan="10">No data Yet</td>
                               </tr>
                                  
                              @endforelse
                            </tbody>
                          </table>
        
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


@section('backend_css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css"  />

@endsection


@section('backend_js')

     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <script>
            $('.toastShow').toast('show');


            $('.parmanentDelete').on('click', function(){
                let deleteBtn = $(this).val();
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = deleteBtn;
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
            });


        </script>

@endsection