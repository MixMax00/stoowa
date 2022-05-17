@extends('layouts.backend_master')

@section('title')
   Add Product
@endsection



@section('backend')


        <div class="container">
                <div class="row">
                        <div class="col-md-12">

                                <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Manage Banner</h2>
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
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Categories</th>
                                            <th>Colors</th>
                                            <th>Sizes</th>
                                            <th>Price</th>
                                            <th>Sale Price</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                    
                    
                                          @forelse ($products as $data)
                    
                                          <tr>
                                              <td>{{ $loop->index +1 }}</td>
                                              <td><img width="50" src="{{ asset('storage/product/'.$data->product_image) }}" alt="{{ $data->product_title }}"></td>
                                              <td>{{ $data->product_title }}</td>
                                              <td>
                                                    
                                                @foreach ($data->categories as  $category) 
                                                     <span class="badge badge-primary">{{ $category->category_name }}</span>
                                                @endforeach
                                              </td>
                                              <td> @foreach ($data->colors as  $color) 
                                                    <span class="badge badge-primary">{{ $color->color_name }}</span>
                                               
                                                @endforeach
                                                </td>
                                              <td>
                                                @foreach ($data->sizes as  $size) 
                                                 <span class="badge badge-primary">{{ $size->size_name }}</span>
                                           
                                                @endforeach
                                                </td>
                                              <td>{{ $data->price}}</td>
                                              <td>{{ $data->sale_price}}</td>
                                              <td>{{ $data->quantity }}</td>
                                              <td>{{ $data->status == 1 ? 'Active' : 'Deactive'  }}</td>
                                              <td>
                    
                                                  <a href="{{ route('product.status', $data->id) }}" class="btn btn-{{ $data->status == 1 ? 'warning' : 'primary' }} btn-sm">{{ $data->status == 1 ? 'Deactive' : 'Active' }}</a>
                                                  <a href="{{ route('product.edit', $data->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                  <a href="{{ route('product.show', $data->id) }}" class="btn btn-info btn-sm">Show</a>
            
                                                  <form action="" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="parmanent-delete btn btn-danger btn-sm">Delete</button>
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
        </div>



@endsection






@section('backend_js')




        <script>
            $('.toastShow').toast('show');



    

        </script>

@endsection