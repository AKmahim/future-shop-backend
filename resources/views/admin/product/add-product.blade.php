@extends('layouts.admin-master')

@section('content')
    {{-- ---- product upload -- = --}}
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4">
            @if(session('success')) 
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            @endif
            <h2 class="mb-1 text-center">Add Product</h2>
            <br>

            <form action="{{ url('/admin/product/store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" name="product_name" required class="form-control" id="floatingInput"
                        placeholder="product name">
                    <label for="floatingInput">Product Name</label>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label text-center">product image - </label>
                    <input name="product_img" class="form-control bg-dark" type="file" id="formFile" required>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="product_price" required class="form-control" id="floatingInput"
                        placeholder="product price">
                    <label for="floatingInput">Product Price</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" value="None" name="product_old_price" required class="form-control" id="floatingInput"
                        placeholder="product old price">
                    <label for="floatingInput">Product Old Price</label>
                </div>
                <div class="form-floating mb-3">
                    {{-- <label for="floatingInput">Product Details</label> --}}
                    <h2>Product Details</h2>

                    <textarea class="form-control"  required name="product_details" id="summernote"></textarea>
                    
                </div>
                <div>
                    <h4>Product Category:</h4>
                    <select name="product_category"  required class="form-select mb-3" aria-label="Default select example">
                        <option selected>Open this select menu and select a category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            
                        @endforeach
                        
                    </select>
                </div>
                <div>
                    <h4>Feature Category:</h4>
                    <select name="feature"  required class="form-select mb-3" aria-label="Default select example">
                        <option selected>Open this select menu and select a category</option>

                        <option value="latest_product">Latest Product</option>
                        <option value="top_rated">Top Rated</option>
                        <option value="sale_off">Sale Off</option>


                            
                        
                        
                    </select>
                </div>
                

                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>







            <!-- summernote css/js -->
            <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
            <script type="text/javascript">
                $('#summernote').summernote({
                    height: 400
                });
            </script>

        </div>
    </div>
    {{-- ---- product upload -- = --}}

@endsection