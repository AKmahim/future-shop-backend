@extends('layouts.admin-master')

@section('content')

@if(session('success')) 
<div class="alert alert-info alert-dismissible fade show d-flex justify-content-between" role="alert">
    <div><i class="fa fa-exclamation-circle me-2"></i> {{ session('success') }}</div>
    <button type="button" class="btn-close" style="background: transparent;" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>
            
@endif
 <!-- Recent Sales Start -->
 <div class="container-fluid pt-4 px-4">

    <div class="d-flex justify-content-between row ">

        <div class="col-sm-12 col-xl-12 bg-secondary text-center rounded p-4 mb-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Filter Order</h6>
                
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            
                            <th scope="col">ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Address</th>
                            <th scope="col">Customer Number</th>
                            <th scope="col">Ordered Date</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->customer_address }}</td>
                                <td>{{ $order->customer_phone }}</td>
                                <td>{{ $order->created_at->format('d-m-Y h:i A') }}</td>
                                <td style="color:green;">{{ $order->order_status }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info"  href="/admin/order/view-details/{{$order->id}}">View</a>
                                    <a class="btn btn-sm btn-primary" onclick="alert('are you sure?')" href="/admin/order/delete/{{$order->id}}">Delete</a>
                                  

                                </td>
                                
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>
<!-- Recent Sales End -->


    
@endsection