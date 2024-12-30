<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
// use App\Models\

class ViewByCategoryController extends Controller
{
    //view by category 
    public function index($category_name){
        // dd($category_name);
        $features = Products::where('feature','latest_product')->take(4)->get();
        $products = Products::where('product_category',$category_name)->get();

        // all category
        $categories = Category::get();
        return view('client-side.view-by-category',compact('features','products','categories'));
    }
}
