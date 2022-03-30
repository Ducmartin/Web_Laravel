@extends('layouts.display')
@section('content')
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="{{route('home')}}" title="">Trang chủ</a>
                    </li>
                    @if (!empty($cat))
                        <li>
                        <a href="{{url()->full()}}" title="">{{$cat->name}}</a>
                    </li>
                    @endif
                    
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    @if (!empty($cat))
                    <h3 class="section-title fl-left">{{$cat->name}}</h3>
                    @endif
                    @if (count($products)==0)
                    <h3 class="section-title fl-left" style="margin-left: 30%;margin-top:5%">Không có sản phẩm nào </h3> 
                    @endif
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị {{count($products)}} trên {{count($product_by_cats)}} sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="{{Route('display.orderby',$name)}}">
                                @csrf
                                <select name="orderby">
                                    <option value="0">Sắp xếp</option>
                                    <option @php if($orderby='gia-giam-dan') echo 'selected' @endphp value="1">Giá giảm dần</option>
                                    <option @php if($orderby='gia-tang-dan') echo 'selected' @endphp value="2">Giá tăng dần</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach ($product_by_cats as $product)
                            @php
                              foreach ($thumbnails as $thumbnail) {
                                        if($thumbnail->product_id==$product->id){
                                            $image=$thumbnail->thumbnail;
                                            break;
                                        }
                                    }
                             @endphp
                            <li>
                                <a href="{{route('detail_product',[$cat=$product->cat->slug,$slug=Str::slug(Str::limit($product->name,'30')),$product->id])}}" title="" class="thumb">
                                    <img src="{{url($image)}}" style="height:130px">
                                </a>
                                <a height="" href="{{route('detail_product',[$cat=$product->cat->slug,$slug=Str::slug(Str::limit($product->name,'30')),$product->id])}}" title="" class="product-name">{{Str::limit($product->name,20)}}</a>
                                <div class="price">
                                    <span class="new">{{number_format($product->price,0,'.','.')}}đ</span>
                                    {{-- <span class="old">20.900.000đ</span> --}}
                                </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                            </li> 
                       
                        @endforeach
                    </ul>
                </div>         
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        {{$product_by_cats->links()}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
           @include('layouts.sidebar')
           @include('layouts.check_product')
        </div>
    </div>
</div>
@endsection