<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;



class AdminProductController extends Controller
{
    //show all product
    public function index(){
        $products = Products::get();
        return view('admin.product.index',compact('products'));
    }
    //add product view
    public function AddProduct(){

        $categories = Category::get();

        // dd($categories);
        return view('admin.product.add-product', compact('categories') );
    }


    //store product into database
    public function StoreProduct(Request $request){
        // dd($request);
        $validated = $request->validate([
                'product_name' => 'required|max:255',
                'product_img' => 'required|mimes:jpg,jpeg,png,webp',
                'product_price' => 'required|max:255',
                'product_old_price' => 'required|max:255',
                'product_category' => 'required|max:255',
                'feature' => 'required|max:255',

                
            ]
        );
        // ============== without resizing system =======
        $category_img = $request->file('product_img');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($category_img->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'frontend/img/product/';
        $last_img = $up_location.$img_name;
        $category_img->move($up_location,$img_name);

        


        Products::insert([
            'product_name' => $request->product_name,
            'product_img' => $last_img,
            'product_price'=>$request->product_price,
            'product_old_price'=>$request->product_old_price,
            'product_details'=>$request->product_details,
            'product_category'=>$request->product_category,
            'feature'=>$request->feature,

        ]);
       return Redirect()->back()->with('success','Product Inserted');

    }

    // delete product 
    public function DeleteProduct($id){
        
        $products = Products::find($id);
        $old_img = $products->product_img;
        unlink($old_img);

        Products::find($id)->delete();
        return Redirect()->back()->with('success','Product Deleted');
    }


    //edit product
    public function EditProduct($id){
        $categories = Category::get();
        $product = Products::find($id);
        // dd($product->product_name);

        return view('admin.product.update-product',compact('categories','product'));
    }

    //store update product data
    public function StoreUpdatedProduct(Request $request,$id){
        $validated = $request->validate([
                'product_name' => 'required|max:255',
                'product_price' => 'required|max:255',
                'product_old_price' => 'required|max:255',
                'product_category' => 'required|max:255',
                'feature' => 'required|max:255',

                
            ]
        );
        $product = Products::find($id);
        $product_details = $product->product_details;
        $product->update([
            'product_name' => $request->product_name,
            'product_price'=>$request->product_price,
            'product_old_price'=>$request->product_old_price,
            'product_details'=>$product_details,
            'product_category'=>$request->product_category,
            'feature'=>$request->feature,

        ]);
        return Redirect()->back()->with('success','Product Updated');
    }

}
