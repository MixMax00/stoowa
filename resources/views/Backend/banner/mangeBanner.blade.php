@extends('layouts.backend_master')



@section('backend')


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Banner Tables <small><a href="{{ route('banner.create') }}" class="btn btn-primary">Add Banner</a></small></h2>
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
                          <th>Banner Top Title</th>
                          <th>Banner Title</th>
                          <th>Banner Description</th>
                          <th>Banner Image</th>
                          <th>Banner Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


                        @forelse ($all_banners as $data)

                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td>{{ $data->banner_title_top }}</td>
                            <td>{{ $data->banner_title }}</td>
                            <td>{{ Str::limit($data->banner_description, '20', '...') }}</td>
                            <td><img src="{{ asset('storage/banner/'.$data->banner_image )}}" alt="{{ $data->banner_title }}" width="200px"></td>
                            <td>{{ $data->banner_status == 1 ? 'Active' : 'Deactive'  }}</td>
                            <td>
                                <a href="{{ route('banner.edit', $data->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('banner.edit', $data->id) }}" class="btn btn-success">View</a>
                               
                                  <a href="{{ route('banner.status', $data->id) }}" class="btn btn-{{ $data->banner_status == 1 ? "warning" : "info"  }}">
                                    {{ $data->banner_status == 1 ? 'Deactive' : 'Active'  }}
                                  </a>
                                
                               
                                
                               

                                <form class="d-inline" action="{{ route('banner.destroy', $data->id) }}" method="POST">
                                  @csrf
                                  @method("DELETE")
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                            
                        @empty
                            
                        @endforelse
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
        </div>



        <div class="row">
          <div class="col-md-12 col-sm-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Deleted Banner</h2>
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
                        <th>Banner Top Title</th>
                        <th>Banner Title</th>
                        <th>Banner Description</th>
                        <th>Banner Image</th>
                        <th>Banner Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>


                      @forelse ($datas as $data)

                      <tr>
                          <td>{{ $loop->index +1 }}</td>
                          <td>{{ $data->banner_title_top }}</td>
                          <td>{{ $data->banner_title }}</td>
                          <td>{{ Str::limit($data->banner_description, '20', '...') }}</td>
                          <td><img src="{{ asset('storage/banner/'.$data->banner_image )}}" alt="{{ $data->banner_title }}" width="200px"></td>
                          <td>{{ $data->banner_status == 2 ? 'Active' : 'Deactive'  }}</td>
                          <td>

                              <a href="{{route('banner.restore',$data->id) }}" class="btn btn-primary btn-sm">Restore</a>
                            
             
                              <button type="submit" value="{{ route('banner.parmanent.delete', $data->id) }}" class="parmanent-delete btn btn-danger">Permanet Delete</button>
                          
                          </td>
                      </tr>
                          
                      @empty
                          
                      @endforelse
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
      </div>
    </div>
</section>





<section>
@if (session('success'))


  
  <div class="toast" data-animation="8000" style="position: absolute; top: 30px; right: 20px;" >
    <div class="toast-header">
      <strong class="mr-auto">{{ config('app.name') }}</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      <P>{{ session('success') }}</P>
    </div>
  </div>

    
@endif
  
</section>
  






@endsection


@section('backend_css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css"  />

@endsection


@section('backend_js')


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


 
  
  








  {{-- sweet alert --}}




  <script>
    $('.toast').toast('show');

    


    $('.parmanent-delete').on('click', function(){


      let btnUrl = $(this).val();

        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = btnUrl;
          } else {
            swal("Your imaginary file is safe!");
          }
        });
    });
    
  </script>



@endsection