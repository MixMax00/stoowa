@extends('layouts.backend_master')




@section('backend')

<section>
   <div class="container">
       <div class="row">
           <div class="col-md-5">
               <div class="x_panel">
                   <div class="x_title">
                       <h2>Coupon Add Table Form </h2>
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
                       <form method="POST" action="{{ route('cupon.store')}}"  id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                           @csrf

                           <div class="item form-group">
                               <label class="col-form-label col-md-5 col-sm-3 label-align" for="first-name">Coupon Name<span class="required">*</span>
                               </label>
                               <div class="col-md-7 col-sm-6 ">
                                   <input type="text" id="first-name" name="name" required="required" class="form-control ">
                               </div>
                           </div>
                           <div class="item form-group">
                               <label class="col-form-label col-md-5 col-sm-3 label-align" for="price">Price<span class="required">*</span>
                               </label>
                               <div class="col-md-7 col-sm-6 ">
                                   <input type="number" id="price" name="price" required="required" class="form-control ">
                               </div>
                           </div>
                           <div class="item form-group">
                               <label class="col-form-label col-md-5 col-sm-3 label-align" for="first-name">Description<span class="required">*</span>
                               </label>
                               <div class="col-md-7 col-sm-6 ">
                                   <textarea name="description" required="required" class="form-control "></textarea>
                               </div>
                           </div>
                           <div class="item form-group">
                              <label class="col-form-label col-md-5 col-sm-3 label-align" for="first-name">Expried Date<span class="required">*</span>
                              </label>
                              <div class="col-md-7 col-sm-6 ">
                                  <input type="date" name="expried_date" required="required" class="form-control" />
                              </div>
                          </div>
                           <div class="ln_solid"></div>
                           <div class="item form-group">
                               <div class="col-md-6 col-sm-6 offset-md-3">
                                   <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                                   <button type="submit" class="btn btn-success btn-sm">Submit</button>
                               </div>
                           </div>

                       </form>
                   </div>
               </div>
           </div>
           <div class="col-md-7">

               <div class="x_panel">
                   <div class="x_title">
                     <h2>Color Table</h2>
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
                           <th>Coupon Name</th>
                           <th>Price</th>
                           <th>Description</th>
                           <th>Expried Date</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                          @forelse ($datas as $data)
                             <tr>
                                 <td>{{ $loop->index +1 }}</td>
                                 <td>{{ $data->name }}</td>
                                 <td>{{ $data->price }}</td>
                                 <td>{{ $data->description }}</td>
                                 <td>{{ $data->expried_date->diffForHumans() }}</td>
                                 <td>
                                    <a href="" class="btn btn-sm btn-info">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
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