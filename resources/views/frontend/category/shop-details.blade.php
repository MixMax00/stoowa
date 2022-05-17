@extends('layouts.frontend_master')




@section('frontend')




<section>
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="index.html">Home</a></li>
                <li>Product Details</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
    ================================================== -->

    <!-- product_details - start
    ================================================== -->
    <section class="product_details section_space pb-0">
        <div class="container">
            <div class="row">
                <div class="col col-lg-6">
                    <div class="product_details_image">
                        <div class="details_image_carousel">

                           
                            @foreach ($details_product->galleres as $gall)
                            <div class="slider_item">
                                
                                
                                <img src="{{ asset('storage/product-description/'.$gall->image) }}" alt="{{ $details_product->product_title }}">
                                
                            </div>
                            @endforeach
                        </div>

                        <div class="details_image_carousel_nav">
                            @foreach ($details_product->galleres as $gall)
                            <div class="slider_item">
                                
                                
                                <img src="{{ asset('storage/product-description/'.$gall->image) }}" alt="{{ $details_product->product_title }}">
                                
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="product_details_content">
                        <h2 class="item_title">{{ $details_product->product_title }}</h2>
                        <p>{{ $details_product->short_description }}</p>
                        <div class="item_review">
                            <ul class="rating_star ul_li">
                                <li><i class="fas fa-star"></i>></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                            <span class="review_value">3 Rating(s)</span>
                        </div>

                        <div class="item_price">
                            <span>{{ $details_product->sale_price }}</span>
                            <del>{{ $details_product->price}}</del>
                        </div>
                        <hr>

                        <div class="item_attribute">
                            <form action="{{ route('add.card') }}" method="POST">
                                @csrf


                                <input type="hidden" name="product_id" value="{{ $details_product->id  }}">
                                <input type="hidden" name="sale_price" value="{{ $details_product->sale_price  }}">
                                <input type="hidden" name="price" value="{{ $details_product->price  }}">


                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="select_option clearfix">
                                            <h4 class="input_title">Size *</h4>
                                            <select name="size">
                                              
                                                @foreach ($details_product->sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="select_option clearfix">
                                            <h4 class="input_title">Color *</h4>
                                            <select name="color">
                                             
                                                @foreach ($details_product->colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            

                                <div class="quantity_wrap">
                                    <div class="quantity_input">
                                        <button type="button" class="input_number_decrement">
                                            <i class="fal fa-minus"></i>
                                        </button>
                                        <input class="input_number" name="quantity" type="number" value="1">
                                        <button type="button" class="input_number_increment">
                                            <i class="fal fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="total_price" id="total_price" data-total="{{ $details_product->sale_price }}">Total: ${{ $details_product->sale_price }}</div>
                                    <input class="sum_total_price" name="total_price" type="hidden" value="{{ $details_product->sale_price }}">
                                </div>

                                <ul class="default_btns_group ul_li">

                                
                                    {{-- @if(isset($cardData->product_id))
                                     <li><a href="{{ route('viewcart') }}" class="btn btn_primary addtocart_btn" >View Cart</a></li>
                                    
                                    @else  --}}
                                    
                                    <li><button type="submit"" class="btn btn_primary addtocart_btn" >Add To Cart</button></li>
                                   
                                    {{-- @endif
                                    --}}
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="details_information_tab">
                <ul class="tabs_nav nav ul_li" role=tablist>
                    <li>
                        <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button" role="tab" aria-controls="description_tab" aria-selected="true">
                        Description
                        </button>
                    </li>
                    <li>
                        <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button" role="tab" aria-controls="additional_information_tab" aria-selected="false">
                        Additional information
                        </button>
                    </li>
                    <li>
                        <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab" aria-controls="reviews_tab" aria-selected="false">
                        Reviews(2)
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                        <p>
                            {!! $details_product->description !!}
                        </p>
                    </div>

                    <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                      {!! $details_product->add_info !!}
                    </div>

                    <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                        <div class="average_area">
                            <div class="row align-items-center">
                                <div class="col-md-12 order-last">
                                    <div class="average_rating_text">
                                        <ul class="rating_star ul_li_center">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <p class="mb-0">
                                        Average Star Rating: <span>4 out of 5</span> (2 vote)
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="customer_reviews">
                            <h4 class="reviews_tab_title">2 reviews for this product</h4>
                            <div class="customer_review_item clearfix">
                                <div class="customer_image">
                                    <img src="assets/images/team/team_1.jpg" alt="image_not_found">
                                </div>
                                <div class="customer_content">
                                    <div class="customer_info">
                                        <ul class="rating_star ul_li">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                        <h4 class="customer_name">Aonathor troet</h4>
                                        <span class="comment_date">JUNE 2, 2021</span>
                                    </div>
                                    <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                                </div>
                            </div>

                            <div class="customer_review_item clearfix">
                                <div class="customer_image">
                                    <img src="assets/images/team/team_2.jpg" alt="image_not_found">
                                </div>
                                <div class="customer_content">
                                    <div class="customer_info">
                                        <ul class="rating_star ul_li">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                        <h4 class="customer_name">Danial obrain</h4>
                                        <span class="comment_date">JUNE 2, 2021</span>
                                    </div>
                                    <p class="mb-0">
                                    Great product quality, Great Design and Great Service.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="customer_review_form">
                            <h4 class="reviews_tab_title">Add a review</h4>
                            <form action="#">
                                <div class="form_item">
                                    <input type="text" name="name" placeholder="Your name*">
                                </div>
                                <div class="form_item">
                                    <input type="email" name="email" placeholder="Your Email*">
                                </div>
                                <div class="your_ratings">
                                    <h5>Your Ratings:</h5>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                </div>
                                <div class="form_item">
                                    <textarea name="comment" placeholder="Your Review*"></textarea>
                                </div>
                                <button type="submit" class="btn btn_primary">Submit Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_details - end
    ================================================== -->


     <!-- related_products_section - start
            ================================================== -->
            <section class="related_products_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="best-selling-products related-product-area">
                                <div class="sec-title-link">
                                    <h3>Related products</h3>

                                   
                                             
                                       


                                    <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                                </div>
                                <div class="product-area clearfix">

                                        @foreach ($details_product->categories as $category)
                                            @foreach ($category->products as $cat_product)

                                                @if ($details_product->slug = $cat_product->slug )
                                                    
                                                @else


                                                <p>{{ $cat_product->product_title }}</p>
                                           
                                                @endif
                                                    
                                            @endforeach

                                        @endforeach     

                                                    <div class="grid">
                                                        <div class="product-pic">
                                                        <a href="{{ route('shop-details' ,['slug' =>$cat_product->slug,'id'=>$cat_product->id]) }}"><img src="{{ asset('storage/product/'.$cat_product->product_image) }}" alt="{{ $cat_product->product_title }}"></a> 
                                                            <div class="actions">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Favourite</title> <path d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"/> </svg></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Shuffle</title> <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7"/> <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17"/> <path d="M19 4L22 7L19 10"/> <path d="M19 13L22 16L19 19"/> </svg></a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="quickview_btn" data-bs-toggle="modal" href="#product-{{ $cat_product->id}}" role="button" tabindex="0"><svg width="48px" height="48px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Visible (eye)</title> <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z"/> <circle cx="12" cy="12" r="3"/> </svg></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <h4><a href="{{ route('shop-details' ,['slug' =>$cat_product->slug,'id'=>$cat_product->id]) }}">{{ $cat_product->product_title }}</a></h4>
                                                            <p><a href="{{ route('shop-details' ,['slug' =>$cat_product->slug,'id'=>$cat_product->id]) }}">{{ $cat_product->short_description }}</a></p>
                                                            <div class="rating">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </div>
                                                            <span class="price">
                                                                <ins>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <bdi>
                                                                            <span class="woocommerce-Price-currencySymbol">$</span>{{ $cat_product->sale_price }}
                                                                        </bdi>
                                                                    </span>
                                                                </ins>
                                                            </span>
                                                            <div class="add-cart-area">
                                                                <a href="{{ route('shop-details' ,['slug' =>$cat_product->slug,'id'=>$cat_product->id]) }}" class="add-to-cart btn btn-dark">Add to cart</a>
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <!-- product quick view modal - start
                                                        ================================================== -->
                                                        <div class="modal fade" id="product-{{ $cat_product->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Product Quick View</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="product_details">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col col-lg-6">
                                                                                        <div class="product_details_image p-0">
                                                                                            <img src="{{ asset('storage/product/'.$cat_product->product_image) }}" alt>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-lg-6">
                                                                                        <div class="product_details_content">
                                                                                            <h2 class="item_title">{{ $cat_product->product_title}}</h2>
                                                                                            <p>
                                                                                                {{ $cat_product->short_description}}
                                                                                            </p>
                                                                                            <div class="item_review">
                                                                                                <ul class="rating_star ul_li">
                                                                                                    <li><i class="fas fa-star"></i></li>
                                                                                                    <li><i class="fas fa-star"></i></li>
                                                                                                    <li><i class="fas fa-star"></i></li>
                                                                                                    <li><i class="fas fa-star"></i></li>
                                                                                                    <li><i class="fas fa-star"></i></li>
                                                                                                </ul>
                                                                                                <span class="review_value">3 Rating(s)</span>
                                                                                            </div>
                                                                                            <div class="item_price">

                                                                                                @if($cat_product->sale_price)
                                                                                                <span>{{ $cat_product->sale_price }}</span>
                                                                                                <del>{{ $cat_product->price}}</del>
                                                                                                @else
                                                                                                <span>{{ $cat_product->sprice }}</span>
                                                                                                @endif
                                                                                            </div>
                                                                                            <hr>
                                                                                            <div class="item_attribute">
                                                                                                <h3 class="title_text">Options <span class="underline"></span></h3>
                                                                                                <form action="#">
                                                                                                    <div class="row">
                                                                                                        <div class="col col-md-6">
                                                                                                            <div class="select_option clearfix">
                                                                                                                <h4 class="input_title">Size *</h4>
                                                                                                                <select>
                                                                                                                    <option data-display="- Please select -">Choose A Option</option>
                                                                                                                    @foreach ($cat_product->sizes as $size)
                                                                                                                        <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col col-md-6">
                                                                                                            <div class="select_option clearfix">
                                                                                                                <h4 class="input_title">Color *</h4>
                                                                                                                <select>
                                                                                                                    <option data-display="- Please select -">Choose A Option</option>
                                                                                                                    @foreach ($cat_product->colors as $color)
                                                                                                                    <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <span class="repuired_text">Repuired Fiields *</span>
                                                                                                </form>
                                                                                            </div>
                                                                                            
                                                                                            <div class="quantity_wrap">
                                                                                                <div class="quantity_input">
                                                                                                    <button type="button" class="input_number_decrement">
                                                                                                        <i class="fal fa-minus"></i>
                                                                                                    </button>
                                                                                                    <input class="input_number" type="number" value="1">
                                                                                                    <button type="button" class="input_number_increment">
                                                                                                        <i class="fal fa-plus"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="total_price" id="total_price" data-total="{{ $cat_product->sale_price }}">Total: ${{ $cat_product->sale_price }}</div>
                                                                                            </div>
                                                                                            
                                                                                            <ul class="default_btns_group ul_li">
                                                                                                <li><a class="addtocart_btn" href="#!">Add To Cart</a></li>
                                                            
                                                                                                <li><a href="#!"><i class="fas fa-heart"></i></a></li>
                                                                                            </ul>
                                                                                            
                                                                                           
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- product quick view modal - end
                                                        ================================================== -->

                                                

                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </section>
            <!-- related_products_section - end
            ================================================== -->

</section>
    
@endsection


@section('frontend_js')

    <script>

         $(document).ready(function(){

            

          
            
             $inputNumber = $('.input_number').val();
             $totalPrice = $('.total_price')[1].dataset.total;

            //  console.log($totalPrice);

             var num = 1;
             $('.input_number_increment').click(function(){
                num++
                $('.input_number').val(num); 
                $('.total_price').text("Total : $" + ($totalPrice*num));
                $('.sum_total_price').val($totalPrice*num);

             });

            //  alert(num);

             $('.input_number_decrement').click(function(){

                if(num > 1){
                    num--
                    $('.input_number').val(num); 
                    $('.total_price').text("Total : $" + ($totalPrice*num));
                    $('.total_price').val(num);
                    $('.sum_total_price').val($totalPrice*num);
                }
               
             });


             

            //  console.log($totalPrice);
           
         });

    </script>


@endsection