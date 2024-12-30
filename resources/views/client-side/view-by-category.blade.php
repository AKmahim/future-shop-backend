@extends('layouts.client-master')

@section('content')
        <!-- Breadcrumb Section Begin -->
        {{-- <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Category</h2>
                            <div class="breadcrumb__option">
                                <a href="{{ url('/') }}">Home</a>
                                <span>Category</span>
                                <span>Category</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Breadcrumb Section End -->
    
        <!-- Product Section Begin -->
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="sidebar">
                            <div class="sidebar__item">
                                <h4>Department</h4>
                                <ul>
                                    @foreach ($categories as $item)
                                        <li><a href="{{url('/category/'.$item->category_name)}}" >{{$item->category_name}}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            <div class="sidebar__item">
                                <h4>Price</h4>
                                <div class="price-range-wrap">
                                    <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                        data-min="10" data-max="5000">
                                        <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    </div>
                                    <div class="range-slider">
                                        <div class="price-input">
                                            <input type="text" id="minamount">
                                            <input type="text" id="maxamount">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__item">
                                <h4>Popular Size</h4>
                                <div class="sidebar__item__size">
                                    <label for="large">
                                        Large
                                        <input type="radio" id="large">
                                    </label>
                                </div>
                                <div class="sidebar__item__size">
                                    <label for="medium">
                                        Medium
                                        <input type="radio" id="medium">
                                    </label>
                                </div>
                                <div class="sidebar__item__size">
                                    <label for="small">
                                        Small
                                        <input type="radio" id="small">
                                    </label>
                                </div>
                                <div class="sidebar__item__size">
                                    <label for="tiny">
                                        Tiny
                                        <input type="radio" id="tiny">
                                    </label>
                                </div>
                            </div>
                            <div class="sidebar__item">
                                <div class="latest-product__text">
                                    <h4>Latest Products</h4>
                                    <div class="latest-product__slider owl-carousel">
                                        <div class="latest-prdouct__slider__item">
                                            @foreach ($features as $item)
                                                <a href="{{ url('/product/'.$item->product_category . '/'.$item->id) }}" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="{{asset($item->product_img)}}" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>{{ $item->product_name }}</h6>
                                                        <span>৳ {{ $item->product_price}}</span>
                                                    </div>
                                                </a>
                                            @endforeach
                                            
                                            
                                        </div>
                                        <div class="latest-prdouct__slider__item">
                                            @foreach ($features as $item)
                                                <a href="{{ url('/product/'.$item->product_category . '/'.$item->id) }}" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="{{asset($item->product_img)}}" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>{{ $item->product_name }}</h6>
                                                        <span>৳ {{ $item->product_price}}</span>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7">
                        <div class="product__discount">
                            <div class="section-title product__discount__title">
                                <h2>Sale Off</h2>
                            </div>
                            <div class="row">
                                <div class="product__discount__slider owl-carousel">
                                    @foreach ($features as $item)
                                        <div class="col-lg-4">
                                            <div class="product__discount__item">
                                                <div class="product__discount__item__pic set-bg"
                                                    data-setbg="{{asset($item->product_img)}}">
                                                    <div class="product__discount__percent">-20%</div>
                                                    <ul class="product__item__pic__hover">
                                                        <li><a href=" {{url('/add-to-cart/'.$item->id)}} "><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__discount__item__text">
                                                    <span> {{ $item->product_category }} </span>
                                                    <h5><a href="{{ url('/product/'.$item->product_category . '/'.$item->id) }}"> {{$item->product_name}} </a></h5>
                                                    <div class="product__item__price">৳ {{$item->product_price}} <span>৳ {{$item->product_price + 100}} </span></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="filter__item">
                            <div class="row">
                                <div class="col-lg-4 col-md-5">
                                    <div class="filter__sort">
                                        <span>Sort By</span>
                                        <select>
                                            <option value="0">Default</option>
                                            <option value="0">Default</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="filter__found">
                                        <h6><span>16</span> Products found</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3">
                                    <div class="filter__option">
                                        <span class="icon_grid-2x2"></span>
                                        <span class="icon_ul"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           @foreach ($products as $item)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{asset($item->product_img)}}">
                                            <ul class="product__item__pic__hover">
                                                {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li> --}}
                                                <li><a href=" {{url('/add-to-cart/'.$item->id)}} "><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="{{ url('/product/'.$item->product_category . '/'.$item->id) }}"> {{$item->product_name}} </a></h6>
                                            <h5>৳ {{$item->product_price}} </h5>
                                        </div>
                                    </div>
                                </div>
                           @endforeach
                            
                        </div>
                        <div class="product__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Section End -->
@endsection