<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function dashboard(){
        $new_orders=Order::where('status_id',5)->paginate(10);
        $orders=Order::all();
        $order_success=0;
        $order_fail=0;
        $sales=0;
        foreach($orders as $order){
            if($order->status_id==6){
                $order_success++;
                $sales+=$order->num_order*$order->product->price;
            }
            if($order->status_id==7){
                $order_fail++;
            }
        }
        return view('admin.dashboard.dashboard',compact('new_orders','order_success','order_fail','sales'));
    }
}
