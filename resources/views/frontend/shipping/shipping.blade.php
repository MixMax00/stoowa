@extends('layouts.frontend_master')





@section('frontend')


<section>

 <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Check Out</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->



             <!-- checkout-section - start
            ================================================== -->
            <section class="checkout-section section_space">
                <div class="container">
                   <div class="row">
                      <div class="col col-md-12">
                         <div class="woocommerce bg-light p-3">

                           <h3 id="order_review_heading m-auto">Your order</h3>


                            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="{{ route('order') }}" enctype="multipart/form-data">
                              @csrf
                                 <div class="row">
                                    <div class="col-md-7">
                                       <div class="woocommerce-billing-fields  card p-3">
                                          <h3>Billing Details</h3>
                                          <p class="form-row form-row form-row-first validate-required w-100" id="billing_first_name_field">
                                             <label for="billing_first_name" class="">FullName <abbr class="required" title="required">*</abbr></label>
                                             <input type="text" class="input-text " name="full_name" id="full_name" placeholder="" autocomplete="given-name" value="" />
                                          </p>

                                          <p class="form-row form-row form-row-first validate-required validate-email w-100" id="billing_email_field">
                                             <label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr></label>
                                             <input type="email" class="input-text" name="email" id="email" placeholder="" autocomplete="email" value="" />
                                          </p>

                                          <div class="clear"></div>
                                          <p class="form-row form-row form-row-first validate-required validate-phone w-100" id="billing_phone_field">
                                             <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                                             <input type="tel" class="input-text " name="phone" id="phone" placeholder="" autocomplete="tel" value="" />
                                          </p>
                                          <div class="clear"></div>

                                          <p class="form-row form-row form-row-first address-field update_totals_on_change validate-required w-100" id="billing_country_field">
                                             <label for="billing_country" class="w-100">Country <abbr class="required" title="required">*</abbr></label>
                                             <select name="country" id=country" autocomplete="country" class="billing_country country_to_state country_select w-100">
                                                <option value="" selected>Select a country&hellip;</option>
                                                @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                @endforeach

                                             </select>
                                          </p>

                                          <p class="form-row form-row form-row-wide form-row-first address-field update_totals_on_change validate-required w-100" id="billing_country_field">
                                             <label for="billing_country" class="w-100">City <abbr class="required" title="required">*</abbr></label>
                                             <select name="city" id="cityId" class="form-control cityId w-100">
                                                <option value="">-----Select City-----</option>
                                             </select>
                                          </p>
                                          <p class="form-row form-row form-row-wide address-field validate-required w-100" id="billing_address_1_field">
                                             <label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
                                             <input type="text" class="input-text " name="address" id="address" placeholder="Street address" autocomplete="address-line1" value="" />
                                          </p>
                                       </div>
                                    </div>

                                    <div class="col-md-5">

                                       <div class="card p-3">
                                          <div class="cart_total_table">
                                             <h3 class="wrap_title">Cart Totals</h3>
                                             <ul class="ul_li_block">
                                                <li>
                                                   <span>Cart Subtotal</span>
                                                   <span>$ {{ $subtotal =  $carts->sum('total_price') }}</span>
                                                   <input type="hidden" name="sub_total" value="{{ $subtotal }}">

                                                </li>
                                                <li>
                                                   <span>Delivery Charge</span>
                                                   @if (isset($applyShippingCharge)) <span>$
                                                         {{ $delivery_charge = $applyShippingCharge->shipping_charge }}
                                                         </span>
                                                         <input type="hidden" name="delivary_charge" value="{{ $delivery_charge }}">

                                                   @endif
                                                </li>

                                                @if(isset($applyCoupon->coupon))
                                                <li>
                                                   <span>Discount : ({{ $applyCoupon->coupon->name }})</span>
                                                   <span>- $ {{ $applyCoupon->coupon->price }}</span>
                                                   <input type="hidden" name="coupon_charge" value="{{ $applyCoupon }}">
                                                </li>
                                                @endif

                                                <li>
                                                   <span>Order Total</span>


                                                   @if ((isset($applyShippingCharge)) && (isset($applyCoupon->coupon))) <span class="total_price"> $ {{ ($grand_total + $delivery_charge) - $applyCoupon->coupon->price  }} </span>
                                                   <input type="hidden"  name="grand_total" value="{{ $grand_total }}">

                                                   @else
                                                      @if(isset($applyCoupon->coupon))
                                                      <span>$ {{ $grand_total = $carts->sum('total_price') - $applyCoupon->coupon->price}}</span>
                                                      <input type="hidden"  name="grand_total" value="{{ $grand_total }}">
                                                      @elseif (isset($applyShippingCharge))
                                                      <span>$ {{ $grand_total = $carts->sum('total_price') + $delivery_charge}}</span>
                                                      <input type="hidden"  name="grand_total" value="{{ $grand_total }}">
                                                      @else
                                                      <span>$ {{ $grand_total =  $carts->sum('total_price') }}</span>
                                                      <input type="hidden" name="grand_total" value="{{ $grand_total }}">
                                                      @endif
                                                   @endif

                                                </li>
                                             </ul>
                                          </div>
                                       <div id="payment" class="woocommerce-checkout-payment py-3 mt-5">
                                          <ul class="wc_payment_methods payment_methods methods">
                                             <li class="wc_payment_method payment_method_cheque mb-2">
                                                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="Cash On Delivery" checked='checked' data-order_button_text="" />
                                                <!--grop add span for radio button style-->
                                                <span class='grop-woo-radio-style'></span>
                                                <!--custom change-->
                                                <label for="payment_method_cheque">Cash On Delivery</label>
                                             </li>
                                             <li class="wc_payment_method payment_method_paypal mb-2">
                                                <input id="payment_method_ssl" type="radio" class="input-radio" name="payment_method" value="SSL" data-order_button_text="Proceed to SSL Commerz" />
                                                <!--grop add span for radio button style-->
                                                <span class='grop-woo-radio-style'></span>
                                                <!--custom change-->
                                                <label for="payment_method_ssl">SSL Commerz</label>
                                             </li>
                                             <li class="wc_payment_method payment_method_paypal">
                                                <input id="paypal" type="radio" class="input-radio" name="payment_method" value="paypal" data-order_button_text="Proceed to SSL Commerz" />
                                                <!--grop add span for radio button style-->
                                                <span class='grop-woo-radio-style'>Paypal</span>
                                                <!--custom change-->

                                             </li>

                                          </ul>
                                          <div class="form-row place-order">

                                            <div id="paypal-button-container"></div>

                                             <noscript>
                                                Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.
                                                <br/>
                                                <input type="submit" class="button alt" name="checkout" value="Update totals" />
                                             </noscript>
                                             <input type="submit" class="button alt" name="checkout" id="place_order" value="Place order" data-value="Place order" />

                                          </div>
                                       </div>
                                       </div>

                                    </div>

                                 </div>


                               </div>

                            </form>



                         </div>
                      </div>
                   </div>
                </div>
             </section>
             <!-- checkout-section - end
             ================================================== -->
            <!-- checkout-section - end
            ================================================== -->


</section>

@endsection







@section('frontend_js')

<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
<script>
    paypal.Buttons({
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '{{ $grand_total }}' // Can also reference a variable or function
            }
          }]
        });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
          alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
          // When ready to go live, remove the alert and show a success message within this page. For example:
          // const element = document.getElementById('paypal-button-container');
          // element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');





            var full_name = $('#full_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var country = $('#country').val();
            var city = $('#cityId').val();
            var address = $('#address').val();
            var grand_total = $('#grand_total').val();
            var payment_method = $('#paypal').val();

            alert(payment_method);

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
            method:"POST",
            url:{{  route('order') }},
            data: {
                'full_name': full_name,
                'full_name': email,
                'phone': phone,
                'country': country,
                'city': city,
                'address': address,
                'grand_total': grand_total,
                'payment_method':"PayPal",
            },
            success:function(data){
                alert(data);
            }
            });







        });
      }
    }).render('#paypal-button-container');
  </script>







@endsection







