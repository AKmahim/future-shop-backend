<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OrderDetails;
use App\Models\Porder;
use App\Models\Products;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;


class AdminOrderController extends Controller
{
    //show all order in admin panel
    public function AllOrder(){
        $orders = OrderDetails::latest()->paginate(20);
        return view('admin.order.index',compact('orders'));
    }


    //delete order 
    public function DeleteOrder($id){
        $order = OrderDetails::find($id);
        //delete all cart data and free
        Porder::whereIn('user_ip', explode(",",$order->user_ip)  )->whereIn('time', explode(",",$order->time)  )->delete();
        OrderDetails::find($id)->delete();
        return Redirect()->route('admin.order.index')->with('success','Order Delete Permanately');

    }

    // view order details
    public function ViewDetails($id){
        $orders = OrderDetails::find($id);
        // dd($orders->user_ip);

        $order_product = Porder::where('user_ip',$orders->user_ip)->get();
        // dd($order_product);
        return view('admin.order.order-details',compact('orders'));
    }

    //order invoice page view
    public function OderInvoice($id){
        $order = OrderDetails::find($id);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.order.order-invoice', $data)
            ->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
                'isPhpEnabled' => true,
                'isHtml5ParserEnabled' => true,
                'isFontSubsettingEnabled' => true,
                
            ]);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->stream('invoice-' . $order->id . '-'. $todayDate . '.pdf');
    }

    // invoice pdf genarate
    public function GenerateInvoice($id){
        $order = OrderDetails::find($id);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.order.order-invoice', $data)
            ->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
                'isPhpEnabled' => true,
                'isHtml5ParserEnabled' => true,
                'isFontSubsettingEnabled' => true,
                
            ]);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-' . $order->id . '-'. $todayDate . '.pdf');$order = OrderDetails::find($id);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.order.order-invoice', $data)
            ->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
                'isPhpEnabled' => true,
                'isHtml5ParserEnabled' => true,
                'isFontSubsettingEnabled' => true,
                
            ]);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-' . $order->id . '-'. $todayDate . '.pdf');
    }


    //update order status  
    public function UpdateOrderStatus(Request $request,$id){
        OrderDetails::find($id)->update([
            'order_status'=>$request->order_status,
            
           ]);

        return Redirect()->back()->with('order_update','Order Status Update');
    }


    // filter oder by phone number , order id , 
    public function FilterOrder(Request $request){
        if($request->filter_category == 'customer_id'){
            $orders = OrderDetails::where('id',$request->filter_text)->get();

            if(!$orders->count()){
                
                return Redirect()->back()->with('success','Order is not avaiable or you put wrong data');
            }
            else{
               
                return view('admin.order.filter',compact('orders'));
            }

        }
        else if($request->filter_category === 'phone_number'){
            $orders = OrderDetails::where('customer_phone',$request->filter_text)->get();
            
            if(!$orders->count()){
                
                return Redirect()->back()->with('success','Order is not avaiable or you put wrong data');
            }
            else{
               
                return view('admin.order.filter',compact('orders'));
            }
        }
        else if($request->filter_category === 'order_status'){
            $orders = OrderDetails::where('order_status',$request->filter_text)->get();
            
            if(!$orders->count()){
                
                return Redirect()->back()->with('success','Order is not avaiable or you put wrong data');
            }
            else{
               
                return view('admin.order.filter',compact('orders'));
            }

        }
        else{
            return Redirect()->back()->with('success','Order is not avaiable or you put wrong data');

        }
        
        

        
    }

}
