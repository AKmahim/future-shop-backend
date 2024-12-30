<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Porder;
use App\Models\OrderDetails;
use Illuminate\Support\Carbon;




class CheckoutController extends Controller
{
    //checkout route 
    public function Chekout(){

        $districts = District::all();
        $carts = Cart::where('user_ip',request()->ip())->latest()->get();
        $total = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->qty;

        });



        return view('client-side.checkout',compact('districts','carts','total'));
    }

    //proccess checkout and store the data into database
    public function ProccessCheckout(Request $request){
        // dd($request);
        $defalt_status = "In Proccessing";
        OrderDetails::insert([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'order_note' => $request->order_note,
            'payment_method_cash' => $request->payment_method_cash,
            'payment_method_bkash' => $request->payment_method_bkash,
            'order_status'=>$defalt_status,
            'user_ip' => $request->ip(),
            'time'=>Carbon::now()->format('d-m-Y h:i A'),
            'created_at' => Carbon::now()
        ]);
        $carts = Cart::where('user_ip',request()->ip())->latest()->get();
        $total = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->qty;
        });
        
        foreach ($carts as $cart) {
            Porder::insert([
                'user_ip' => $request->ip(),
                'product_id'=>$cart->product_id,
                'qty' => $cart->qty,
                'time' => Carbon::now()->format('d-m-Y h:i A'),
                'created_at' => Carbon::now()
            ]);
        }

        //delete all cart data and free
        Cart::whereIn('user_ip', explode(",",request()->ip())  )->delete();
        


        return Redirect('/')->with('success','Order complete');
        
    }
}
