@extends('layouts.display')
@section('content')
    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="{{ route('home') }}" title="Trang Chủ">Trang chủ</a>
                        </li>
                        <li>
                            <a href="#" title="giỏ hàng">Giỏ Hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="info-cart-wp">
                <div class="section-detail table-responsive">
                    @if (session('success'))
                        <div class="alert alert-primary">{{session('success')}}</div>
                    @endif
                    @if (Cart::count() != 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <td>Mã sản phẩm</td> --}}
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td colspan="2">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (Cart::content() as $cart)
                                    <tr>
                                        {{-- <td>HCA00031</td> --}}
                                        <td>
                                            <a href="{{ Route('detail_product', [($cat = $cart->options->cat), ($slug = Str::slug($cart->name)), $cart->id]) }}"
                                                title="{{ $cart->name }}" class="thumb">
                                                <img src="{{ url($cart->options->img) }}" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ Route('detail_product', [($cat = $cart->options->cat), ($slug = Str::slug($cart->name)), $cart->id]) }}"
                                                title="{{ $cart->name }}" class="name-product">{{ $cart->name }}</a>
                                        </td>
                                        <td>{{ number_format($cart->price, '0', '.', '.') }}đ</td>
                                        <td>
                                            <input type="text" name="num-order" value="{{ $cart->qty }}"
                                                class="num-order">
                                        </td>
                                        <td>{{ number_format($cart->subtotal, '0', '.', '.') }}đ</td>
                                        <td>
                                            <a href="{{ Route('removecart', $cart->rowId) }}" title=""
                                                class="del-product"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">Tổng giá:
                                                <span>{{ Cart::subTotal(0, '.', '.') }}vnđ</span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                <a href="{{ route('display.payment') }}" title="" id="checkout-cart">Thanh
                                                    toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    @endif

                </div>
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số
                        lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                    <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br />
                    <a href="" title="" id="delete-cart">Xóa giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
@endsection
