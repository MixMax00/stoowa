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



                            <div class="slider_item">


                                <img src="{{ asset('storage/banner/'.$details_banner->banner_image )}}" alt="{{ $details_banner->product_title }}">

                            </div>

                        </div>

                        <div class="details_image_carousel_nav">

                            <div class="slider_item">


                                <img src="{{ asset('storage/banner/'.$details_banner->banner_image )}}" alt="{{ $details_banner->banner_title}}">

                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="product_details_content">
                        <h2 class="item_title">{{ $details_banner->banner_title}}</h2>
                        <p>{{ $details_banner->banner_description}}</p>
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
                            <span>{{ $details_banner->sele_price }}</span>
                            <del>{{ $details_banner->price}}</del>
                        </div>
                        <hr>

                        <div class="item_attribute">
                            <form action="{{ route('add.card') }}" method="POST">
                                @csrf


                                <input type="hidden" name="product_id" value="{{ $details_banner->id  }}">
                                <input type="hidden" name="sale_price" value="{{ $details_banner->sele_price  }}">
                                <input type="hidden" name="price" value="{{ $details_banner->price  }}">




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
                                    <div class="total_price" id="total_price" data-total="{{ $details_banner->sele_price }}">Total: ${{ $details_banner->sele_price }}</div>
                                    <input class="sum_total_price" name="total_price" type="hidden" value="{{ $details_banner->sele_price }}">
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
                            {{ $details_banner->banner_description  }}
                    </div>

                    <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                        {{ $details_banner->banner_description  }}
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
