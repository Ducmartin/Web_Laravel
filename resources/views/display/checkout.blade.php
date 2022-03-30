@extends('layouts.display')
@section('content')
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="{{route('home')}}" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="{{route('display.payment')}}" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                <form method="POST" action="{{route('order')}}" name="form-checkout">
                    @csrf
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" value="{{$customer->fullname}}" name="fullname" id="fullname">
                            @error('fullname')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" value="{{$customer->email}}" name="email" id="email">
                        </div>
                        @error('email')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" value="{{$customer->address}}" name="address" id="address">
                            @error('address')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" value="{{$customer->phone_number}}" name="phone_number" id="phone">
                            @error('phone_number')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note" id="notes" cols="75" rows="5"></textarea>
                        </div>
                    </div>
                    <div id="payment-checkout-wp">
                        <ul id="payment_methods">
                            <li>
                                <input type="radio" id="direct-payment" name="payment_method" value="1">
                                <label for="direct-payment">Thanh toán tại cửa hàng</label>
                            </li>
                            <li>
                                <input type="radio" id="payment-home" name="payment_method" value="2">
                                <label for="payment-home">Thanh toán tại nhà</label>
                            </li>
                            @error('payment-method')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </ul>
                    </div>
                    <div class="place-order-wp clearfix">
                        <input type="submit" id="order-now" value="Đặt hàng">
                    </div>
                </form>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $cart)
                        <tr class="cart-item">
                        <td class="product-name">{{$cart->name}}<strong class="product-quantity">x {{$cart->qty}}</strong></td>
                        <td class="product-total">{{number_format($cart->price,0,'.','.')}}đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price">{{Cart::subTotal(0,'.','.')}}</strong></td>
                        </tr>
                    </tfoot>
                </table>
                {{-- <div id="payment-checkout-wp">
                    <ul id="payment_methods">
                        <li>
                            <input type="radio" id="direct-payment" name="payment-method" value="direct-payment">
                            <label for="direct-payment">Thanh toán tại cửa hàng</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-home" name="payment-method" value="payment-home">
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                    </ul>
                </div>
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" value="Đặt hàng">
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection