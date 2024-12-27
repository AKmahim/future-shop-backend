@extends('layouts.client-master')

@section('content')
    

    @if(session('cart_destroy')) 
    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">
        <strong> {{ session('cart_destroy') }} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
    </div>
    @endif

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" >
                    <div class="breadcrumb__text">
                        <h2 style="color:black;">Shopping Cart</h2>
                        <div class="breadcrumb__option" >
                            <a href="{{url('/')}}" style="color:black;">Home</a>
                            <span style="color:black;">Shopping Cart</span>
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

    @if ( $cart )

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img style="height: 60px;width:60px" src="{{asset($cart->product->product_img)}}" alt="">
                                            <h5>{{$cart->product->product_name}}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            ৳ {{ $cart->price }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{$cart->qty}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            ৳ {{ $cart->price * $cart->qty }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href=" {{ url('cart/destroy/'.$cart->id) }} ">
                                            <span class="icon_close"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{url('/')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>৳ {{ $total }}</span></li>
                            @if ($total)
                                <li>Delivery charge <span>+ ৳ 80 </span></li>
                            @endif
                            

                            <li>Total <span>৳ 
                                @if($total)
                                    {{$total + 80 }}  
                                @else 
                                    00.00
                                @endif
                            </span></li>
                        </ul>
                        <a href="{{route('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
        
    @else
        <h1 style="text-align: center;margin-top:5rem;margin-bottom:5rem;">
            No product in the cart
        </h1>
    @endif


@endsection