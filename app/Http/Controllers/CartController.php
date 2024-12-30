<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use App\Models\Category;


class CartController extends Controller
{
    //add to cart 
    public function AddToCart(Request $request,$product_id){
      
        //    $data->all();
        $check = Cart::where('product_id',$product_id)->where('user_ip',$request->ip())->first();
        $product = Products::find($product_id);

       
       if($check){
           Cart::where('product_id',$product_id)->where('user_ip',$request->ip())->increment('qty');
           $data = Cart::where('user_ip',$request->ip())->get();
           $sum =0;
           foreach($data as $i){
            $sum = $sum + $i->qty;
           }
        //    return Redirect()->back()->with('success','Product added to cart');
        return Redirect()->back();

       }
       else{
            Cart::insert([
                'product_id' => $product_id,
                'qty' => 1,
                'price' => $product->product_price,
                'user_ip' => request()->ip(),
            ]);

            $data = Cart::where('user_ip',$request->ip())->get();
            $sum =0;
            foreach($data as $i){
                $sum = $sum + $i->qty;
            }
        //    return Redirect()->back()->with('success','Product added to cart');
            return Redirect()->back();

           
       }

    }


    // view cart list page 
    public function Cart(){

        $categories = Category::get();
        $carts = Cart::where('user_ip',request()->ip())->latest()->get();

        $total = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->qty;
        });
        // dd($carts);


        return view('client-side.cart',compact('categories','carts','total'));
    }

    //destroy cart by id 
    public function DestroyCart($id){
        Cart::where('id',$id)->where('user_ip',request()->ip())->delete();
        return Redirect()->back()->with('cart_destroy','Cart Deleted');
    }

    // Method to get the cart count
    public function getCartCount()
    {
        
        $cartCount = Cart::all()->where('user_ip',request()->ip())->sum('qty'); // Adjust this query based on your cart implementation
        $totalAmount = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->qty;
        });
        // Return the cart count as JSON
        return response()->json(['cartCount' => $cartCount,'totalAmount'=> $totalAmount]);
    }





}
