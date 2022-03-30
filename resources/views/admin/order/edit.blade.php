@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="{{route('order.validation')}}" method="POST">
                @csrf
                <label for="customer" class="form-label">Họ tên khách hàng:</label>
                <input type="text" name="customer" class="form-control" id="customer" value="{{$order->customer->fullname}}" readonly>
                <label for="phone" class="form-label">SĐT:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{$order->customer->phone_number}}" readonly>
                <label for="address" class="form-label">Địa chỉ:</label>
                <input type="text" class="form-control" name="address" id="address" value="{{$order->customer->address}}" readonly>
                <label for="product" class="form-label">Tên Sản phẩm:</label>
                <input type="text" class="form-control" id="product" name="product" value="{{$order->product->name}}" readonly>
                <label for="number" class="form-label">Số Lượng:</label>
                <input type="number" class="form-control" id="number" name="qty" value="{{$order->num_order}}" readonly>
                <label for="note" class="form-label">Chú ý:</label>
                <input type="text" class="form-control" id="number" name="note" value="{{$order->note}}">
                <label for="status" class="form-label">Trạng Thái:</label>
                <select name="status" id="status" class="form-control">
                    <option value="5" {{$status=$order->status_id==5?'selected':' '}}>Đang xử lý</option>
                    <option value="6" {{$status=$order->status_id==6?'selected':' '}}>Hoàn Thành</option>
                    <option value="7" {{$status=$order->status_id==7?'selected':' '}}>Bị Hủy</option>
                </select>
                <input type="hidden" name="id" value="{{$order->id}}">
                <button style="margin-top:5px" class="btn btn-primary">Chỉnh sửa</button>
            </form>
        </div>
    </div>
</div>
@endsection