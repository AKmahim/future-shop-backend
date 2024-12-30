@extends('layouts.client-master')

@section('content')
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Checkout</h2>
                            <div class="breadcrumb__option">
                                <a href="{{url('/')}}">Home</a>
                                <span>Checkout</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->
        @php
            $cart = App\Models\Cart::all()->where('user_ip',request()->ip())->sum('qty');
        @endphp
@if ($cart)
            <!-- Checkout Section Begin -->
            <section class="checkout spad">
                <div class="container">
                   
                    <div class="checkout__form">
                        <h4>Billing Details</h4>
                        <form action="{{route('proccess-checkout')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="checkout__input">
                                                <p>Name ( আপনার নাম ) <span>*</span></p>
                                                <input type="text" required name="customer_name">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="checkout__input">
                                                <p> Mobile Number ( মোবাইল নাম্বার )  <span>*</span></p>
                                                <input type="text" name="customer_phone" required placeholder="017xxxxxxxx">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-lg-12">
                                            <div class="checkout__input" style="width: 500px;">
                                                <p> District (জেলা) <span>*</span></p>
                                                
                                               <div>
                                                    <select name="district" >
                                                        <option selected>Select a district </option>
                                                        @foreach ($districts as $district)
                                                        <option value="{{ $district->name }}">{{ $district->name }}</option>
                                                            
                                                        @endforeach
                                                        
                                                    </select>
                                               </div>
                                            </div>
                                        </div>
                                        
                                    </div> --}}
                                   
                                    <div class="checkout__input">
                                        <p>Full Address ( সম্পূর্ণ ঠিকানা ) <span>*</span></p>
                                        <input type="text" name="customer_address" required placeholder="হাউজ নাম্বার, রোড, ইউনিয়ন, উপজেলা, জেলা" class="checkout__input__add">
                                    </div>
                                    <h3 class="mb-2">ADDITIONAL INFORMATION</h3>
                                    {{-- <div class="checkout__input__checkbox">
                                        <label for="acc">
                                            Create an account?
                                            <input type="checkbox" id="acc">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <p>Create an account by entering the information below. If you are a returning customer
                                        please login at the top of the page</p>
                                    <div class="checkout__input">
                                        <p>Account Password<span>*</span></p>
                                        <input type="text">
                                    </div>
                                    <div class="checkout__input__checkbox">
                                        <label for="diff-acc">
                                            Ship to a different address?
                                            <input type="checkbox" id="diff-acc">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div> --}}
                                    <div class="checkout__input">
                                        <p>Order notes (optional)</p>
                                        <textarea name="order_note" rows="7" cols="40"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="checkout__order">
                                        <h4>Your Order</h4>
                                        <div class="checkout__order__products">Products <span>Total</span></div>
                                        <ul>
                                            @foreach ($carts as $cart)
                                            <li> {{$cart->product->product_name}} <span>৳ {{$cart->product->product_price}}</span></li>
                                            @endforeach
                                            
                                            
                                        </ul>
                                        <div class="checkout__order__subtotal">Subtotal <span>৳ {{$total}}</span></div>
                                        <div class="checkout__order__subtotal">Delivery Charge <span>৳ 80</span></div>
                                        <div class="checkout__order__total">Total <span>৳ 
                                            @if($total)
                                                {{$total + 80 }}  
                                            @else 
                                                00.00
                                            @endif
                                        </span></div>
                                        <div class="checkout__input__checkbox">
                                            <label for="payment">
                                                Cash on delivery
                                                <input name="payment_method_cash" type="checkbox" id="payment">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="checkout__input__checkbox">
                                            <label for="paypal">
                                                bKash Payment
                                                <input name="payment_method_bkash" type="checkbox" id="paypal">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <button type="submit" class="site-btn">PLACE ORDER</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- Checkout Section End -->
@else
    <h1 style="text-align: center;margin-top:5rem;margin-bottom:5rem;">
        No product in the cart
    </h1>
@endif

@endsection