@extends('layouts.client-master')
@section('style')
<script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('content')




@section('hero')
   <div class="">
        <div class="hero__item set-bg " style="margin-top: 1rem;" data-setbg="{{ asset('frontend') }}/img/hero/banner.jpg">
            <div class="hero__text" style="display:flex;justify-content:center;align-items:center;">
                {{-- <span>FRUIT FRESH</span>
                <h2>Vegetable <br />100% Organic</h2>
                <p>Free Pickup and Delivery Available</p> --}}
                    <br>
                    <br>
                <a href="#" class="primary-btn " >SHOP NOW</a>
            </div>
        </div>
        
   </div>
@endsection



<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">

                @foreach ((App\Models\Category::get()) as $item)
                    <div class="col-lg-2" >
                        <div class="categories__item set-bg" style="width: 200px;height:200px;" data-setbg="{{ asset($item->category_img) }}">
                            <h5><a href="{{url("/category/".$item->category_name)}}">{{$item->category_name}}</a></h5>
                        </div>
                    </div>
                @endforeach

                
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach ($categories as $item)
                            <li data-filter=".{{$item->category_name}}">{{$item->category_name}}</li>
                        @endforeach
                        {{-- <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($products as $item)
                <div class="col-lg-2 col-md-4 col-sm-4  mix {{$item->product_category}}" style="margin:1rem;">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg rounded" style="width: 200px;height:200px;" data-setbg="{{ asset($item->product_img) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li onclick="addToCart({{$item->id}}, event)"><a href="javascript:void(0);" id="cartLink"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{url('/product/'.$item->product_category.'/'.$item->id)}}"> {{$item->product_name}} </a></h6>
                            <h5>৳ {{$item->product_price}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
          
            
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
{{-- <div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ asset('frontend') }}/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ asset('frontend') }}/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End --> --}}

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach ($latest as $item)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($item->product_img) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$item->product_name}}</h6>
                                        <span>৳ {{$item->product_price}}</span>
                                    </div>
                                </a>
                            @endforeach
                            
                            
                        </div>
                        <div class="latest-prdouct__slider__item">
                            @foreach ($latest as $item)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($item->product_img) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$item->product_name}}</h6>
                                        <span>৳ {{$item->product_price}}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach ($tops as $item)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($item->product_img) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$item->product_name}}</h6>
                                        <span>৳ {{$item->product_price}}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="latest-prdouct__slider__item">
                            @foreach ($tops as $item)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($item->product_img) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$item->product_name}}</h6>
                                        <span>৳ {{$item->product_price}}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- Latest Product Section End -->



<script>


window.onload = function() {
    // Your code to initialize or perform actions when the page is fully loaded
    

    updateCartCount();
    // Other initialization code...

    
};

        
    function updateCartCount() {
            fetch('/get-cart-count', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                
                document.getElementById('cartCount').textContent = data.cartCount; // Update the cart count displayed
                document.getElementById('cartCountMobile').textContent = data.cartCount; // Update the cart count displayed
                
                document.getElementById('totalAmount').textContent = '৳ ' +  data.totalAmount; // Update the cart count displayed
                document.getElementById('totalAmountMobile').textContent = '৳ ' +  data.totalAmount; // Update the cart count displayed

                console.log(data);

            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    // updateCartCount();

    function addToCart(id, event) {
        event.preventDefault(); // Prevent default link behavior

        // Use the 'id' parameter in your fetch call
        fetch(`/add-to-cart/${id}`)
            .then(res => {
                // Handle the response as needed
                // console.log(res);
                Swal.fire({
                    title: "Product Added",
                    text: "Product added to cart successfully",
                    icon: "success"
                });
                updateCartCount();
            })
            .catch(error => {
                // Handle any errors from the fetch call
                console.error('Error:', error);
                Swal.fire({
                    title: "Error",
                    text: "Failed to add product to cart",
                    icon: "error"
                });
            });
    }

    

</script>


@endsection
