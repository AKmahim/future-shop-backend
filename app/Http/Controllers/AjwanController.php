<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;


class AjwanController extends Controller
{
    //home page function 
    public function Index(){
        $categories = Category::get();
        $products = Products::get();

        $latest = Products::where('feature', 'latest_product')
               ->take(3)
               ->get();

        $tops = Products::where('feature','top_rated')
                ->take(3)
                ->get();
        return view('client-side.index',compact('products','categories','latest','tops'));
    }

    //contact page function
    public function Contact(){
        return view('client-side.contact');
    }

    //product details function
    public function ProductDetails($category,$id){
        // dd($category,$id);
        $product = Products::find($id);
        $features = Products::where('product_category',$category)
                            ->take(4)
                            ->get();

        return view('client-side.product-details',compact('product','features'));
    }
}
