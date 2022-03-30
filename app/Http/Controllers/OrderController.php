<?php

namespace App\Http\Controllers;
use App\Order;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    function list_order(){
        $orders=Order::paginate('10');
        $yes=count(Order::where('status_id',5)->get());
        $no=count(Order::where('status_id',6)->get());
        return view('admin.order.list_order',compact('orders','yes','no'));
    }
    function complete(){
        $orders=Order::where('status_id',6)->paginate('10');
        $yes=count(Order::where('status_id',5)->get());
        $no=count(Order::where('status_id',6)->get());
        return view('admin.order.list_order',compact('orders','yes','no'));
    }
    function processing(){
        $orders=Order::where('status_id',5)->paginate('10');
        $yes=count(Order::where('status_id',5)->get());
        $no=count(Order::where('status_id',6)->get());
        return view('admin.order.list_order',compact('orders','yes','no'));
    }
    function search(Request $request){
        $names=Customer::where('username','LIKE','%'.$request->search.'%')->orwhere('fullname','LIKE','%'.$request->search.'%')->id->first();
        $orders=Order::where('customer_id','LIKE','%'.$names.'%')->paginate(10); 
        $yes=count(Order::where('status_id',5)->get());
        $no=count(Order::where('status_id',6)->get());
        return view('admin.order.list_order',compact('orders','yes','no'));
    }
    function delete($id){
     Order::find($id)->delete();
     return redirect('order/list_order');
    }
    function edit($id){
     $order=Order::find($id);
     return view('admin.order.edit',compact('order'));
    }
    function validation(Request $request){
     Order::where('id',$request->id)->update([
         'note'=>$request->note,
       'status_id'=>$request->status,
     ]);
     return redirect()->route('order.list_order')->with('success','Đã chỉnh sửa thành công!!!!');
    }
}
