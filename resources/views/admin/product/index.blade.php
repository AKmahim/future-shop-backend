@extends('layouts.admin-master')

@section('content')
    
    <div class="">
        @if(session('success')) 
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            @endif
        <div class="row featured__filter">
            @foreach ($products as $item)

                <div class="col-lg-3 col-md-4 col-sm-6 p-4">
                    
                    <div class="mx-lg-auto text-center">
                        <img style="height: 200px;border-radius:10px" src="{{ asset($item->product_img) }}" alt="" srcset="">

                    </div>                    
                    <div class="text-center d-flex r mt-2">
                        <p>{{$item->product_name}}</p>
                        <p class="ms-2">৳{{$item->product_price}}</h4>
                    </div>
                    <div class="d-flex ">
                        <a href="{{url('admin/product/delete/'.$item->id)}}" class="btn btn-primary m-2" onclick="alert('are you sure?')">Delete</a>
                        <a href="{{url('admin/product/edit/'.$item->id)}}" class="btn btn-primary m-2">Edit</a>
                    </div>
                </div>
                
            @endforeach
        </div>

    </div>


@endsection