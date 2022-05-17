@extends('layouts.frontend_master')




@section('frontend')




      <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- cart_section - start
            ================================================== -->
            <section class="cart_section section_space">
                <div class="container">

                    <div class="cart_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>


                              


                               @forelse ($carts as $card)
                                    <tr>
                                        <td>
                                            <div class="cart_product">
                                                <img  src="{{ asset('storage/product/'.$card->product->product_image) }}" alt="{{ $card->product->product_title }}" width="50" height="50">
                                                <h3><a href="{{ route('shop-details', ['slug'=>$card->product->slug,'id'=>$card->id]) }}">{{ $card->product->product_title }}</a></h3>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @if ($card->sale_price)
                                             <span class="price_text">{{  $card->sale_price }}</span>
                                            @else
                                            <span class="price_text">{{ $card->price }}</span>
                                            @endif
                                       </td>
                                        <td class="text-center">
                                            <form action="{{ route('updatecard') }}" method="POST">
                                                @csrf
                                                <div class="quantity_input">

                                                    <input type="number" name="quantity" value="{{ $card->quantity }}">
                                                    <input type="hidden" name="id" value="{{ $card->id}}">
                                                    <input type="hidden" name="price" value="@if ($card->sale_price) {{  $card->sale_price }}  @else {{ $card->price }}   @endif"> 
                                                    <input type="submit" name="btn" class="btn border_black" value="Update">
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center"><span class="price_text">{{ $card->total_price }}</span></td>
                                        <td class="text-center"><a href="{{ route('delete', ['id'=>$card->id]) }}" class="remove_btn "><i class="fal fa-trash-alt"></i></a></td>
                                    </tr>
                               @empty

                                    <tr>
                                        <td class="text-danger text-center" colspan="10">Empity Cart</td>
                                    </tr>
                                   
                               @endforelse
                               
                               
                            </tbody>
                        </table>
                    </div>

                    <div class="cart_btns_wrap">
                        <div class="row">
                            <div class="col col-lg-6">
                                <form action="{{ route('applycoupon') }}" method="POST">
                                    @csrf
                                    <div class="coupon_form form_item mb-0">
                                        <input type="text" name="coupon" value="@if (isset($applyCoupon->coupon)) {{ $applyCoupon->coupon->name }}@endif" placeholder="Coupon Code...">
                                        <button type="submit" class="btn btn_dark">Apply Coupon</button>
                                        <div class="info_icon">
                                            <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Your Info Here"></i>
                                        </div>
                                    </div>
                                    <div>
                                     @if (session('message'))
                                       <p class="text-danger">{{ session('message') }}</p>

                                     @endif

                                     @if (isset($applyCoupon->coupon))
                                        @if (session('success'))
                                       <p class="text-success">{{ session('success') }}</p>
                                       @endif
                                     @endif
                                        
                                    </div>
                                </form>
                            </div>

                            <div class="col col-lg-6">
                                <ul class="btns_group ul_li_right">
                
                                    <li><a class="btn btn_dark" href="{{ route('shipping') }}">Prceed To Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="calculate_shipping">
                                <h3 class="wrap_title">Calculate Shipping <span class="icon"><i class="far fa-arrow-up"></i></span></h3>
                                <form action="@if (isset($applyShippingCharge->id)) {{ route('shippingcharge.update',["id" =>$applyShippingCharge->id]) }} @else{{ route('shippingcharge') }} @endif" method="POST">
                                    @csrf
                                    <div class="select_option clearfix">
                                        <select name="shipping_charge" id="shippingCharge">
                                            <option selected>--- Select Your City ---</option>
                                            @forelse ($shippingCharge as $shippingChargeData)
                                              <option value="{{ $shippingChargeData->id }}">{{ $shippingChargeData->shipping_charge_name }}</option>
                                            @empty
                                             <option><span class="text-danger">No Data Yet</span></option>
                                            @endforelse
                                            
                                        </select>
                                    </div>
                                    <br>
                                    @if(isset($applyShippingCharge->id))
                                     <button type="submit" class="btn btn_primary rounded-pill">Update Total</button>
                                    @else
                                     <button type="submit" class="btn btn_primary rounded-pill">Calculate Total</button>
                                    @endif
                                    
                                </form>
                            </div>
                        </div>

                        <div class="col col-lg-6">
                            <div class="cart_total_table">
                                <h3 class="wrap_title">Cart Totals</h3>
                                <ul class="ul_li_block">
                                    <li>
                                        <span>Cart Subtotal</span>

                                        {{-- @if(isset($applyCoupon->coupon))
                                        <span>$ {{ $subtotal = $carts->sum('total_price') - $applyCoupon->coupon->price}}</span>
                                        @else --}}
                                        <span>$ {{ $subtotal =  $carts->sum('total_price') }}</span>
                                        
                                    </li>
                                    <li>
                                        <span>Delivery Charge</span>
                                        @if (isset($applyShippingCharge)) <span>$
                                            {{ $delivery_charge = $applyShippingCharge->shipping_charge }}
                                            </span> 
                                       @endif 
                                    </li>

                                    @if(isset($applyCoupon->coupon))
                                    <li>
                                        <span>Discount : ({{ $applyCoupon->coupon->name }})</span>
                                        <span>- $ {{ $applyCoupon->coupon->price }}</span>
                                    </li>   
                                    @endif
                                   
                                    <li>
                                        <span>Order Total</span>

                                       
                                        @if ((isset($applyShippingCharge)) && (isset($applyCoupon->coupon))) <span class="total_price"> $ {{ ($subtotal + $delivery_charge) - $applyCoupon->coupon->price  }} </span>
                                        
                                        @else
                                           @if(isset($applyCoupon->coupon))
                                           <span>$ {{ $subtotal = $carts->sum('total_price') - $applyCoupon->coupon->price}}</span>
                                           @elseif (isset($applyShippingCharge))
                                           <span>$ {{ $subtotal = $carts->sum('total_price') + $delivery_charge}}</span>
                                           @else
                                           <span>$ {{ $subtotal =  $carts->sum('total_price') }}</span>
                                           @endif
                                        @endif 

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cart_section - end
            ================================================== -->




          


@endsection





@section('frontend_js')


    <script>


        $(document).ready(function(){

            // var shippingChargeIdInput = $('#shippingCharge');
            // shippingChargeIdInput.change(function(){
            //     var shippingChargeId = $(this).val();

            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });

            //     $.ajax({
            //     type:'POST',
            //     url: {{ route('shippingcharge') }},
            //     data: {shippingChargeId:shippingChargeId},
            //     success:function(data) {
                     
            //         }
            //     });
            // });



            // var increment = input_number_increment_{ $carts->product->id };

            // alert(increment);






        });





    </script>    

@endsection
