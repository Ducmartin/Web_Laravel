@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        @if (session('success'))
            <p class="alert alert-success">{{session('success')}}</p>
        @endif
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách đơn hàng</h5>
            <div class="form-search form-inline">
                <form action="{{route('order.search')}}" method="GET">
                    <input type="text" name="search" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{route('order.processing')}}" class="text-primary">Đang xử lý<span class="text-muted">({{$yes}})</span></a>
                <a href="{{route('order.complete')}}" class="text-primary">Hoàn thành<span class="text-muted">({{$no}})</span></a>
                
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            @if (count($orders)>0)
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Mã</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                     $t=0;   
                    @endphp
                    @foreach ($orders as $order)
                    @php
                        $t++;
                    @endphp
                        <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>{{$t}}</td>
                        <td>{{$order->id}}</td>
                        <td>
                            {{$order->customer->fullname}}<br>
                            {{$order->customer->phone_number}}
                        </td>
                        <td><a href="#"> {{$order->product->name}}</a></td>
                        <td> {{$order->num_order}}</td>
                        <td>{{number_format($order->product->price,0,'.','.')}}đ</td>
                        @if ($order->status_id==7)
                        <td><span class="badge badge-dark">{{$order->status->name}}</span></td>
                        @else   
                         <td><span class="badge badge-{{$badge=$order->status_id==5?'warning':'success'}}">{{$order->status->name}}</span></td>
                        @endif
                       
                        <td>{{$order->created_at}}</td>
                        <td>
                            <a href="{{route('order.edit',$order->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{route('order.delete',$order->id)}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
            @else
            <p class="text-center">Không tìm thấy đơn hàng nào trong danh sách</p>
            @endif
           {{$orders->links()}}
        </div>
    </div>
</div>
@endsection