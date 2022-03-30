@extends('layouts.display')
@section('content')
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="{{route('home')}}" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="{{route('display.product',$name=Str::slug($cat_id->name))}}" title="">{{$cat_id->name}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right"  >
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href=""  title="" id="main-thumb">
                             <img id="zoom" style="height:360px;width:358px" src="{{url($avatar)}}" data-zoom-image="{{url($avatar)}}"/>
                        </a>
                        <div id="list-thumb">
                            @foreach ($thumbnail as $thumbnail)
                            <a class="{{$active=$avatar==$thumbnail->thumbnail?'active':' '}}" href=""data-image="{{url($thumbnail->thumbnail)}}" data-zoom-image="{{url($thumbnail->thumbnail)}}">
                                <img  id="zoom" src="{{url($thumbnail->thumbnail)}}" />
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img style="width:100%;height:50%" src="{{url($avatar)}}" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name">{{$product->name}}</h3>
                        <div class="desc">
                        {!!$product->desc!!}
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status">{{$product->status->name}}</span>
                        </div>
                        <p class="price">{{number_format($product->price,0,'.','.')}}đ</p>
                        <div id="num-order-wp">
                            <form action="{{Route('value_order')}}" method="POST">
                            @csrf
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num_order" value="1" id="num-order">
                            <input type="hidden" name="product" value="{{$product->id}}">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a><br>
                            <input class="add-cart" style="margin-top: 10px" type="submit" value="Thêm Giỏ Hàng">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                
                    {!!$product->detail!!}
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach ($product_by_cat as $item)
                        @php
                        foreach ($thumbnails as $thumbnail) {
                                  if($thumbnail->product_id==$item->id){
                                      $image=$thumbnail->thumbnail;
                                      break;
                                  }
                              }
                        @endphp
                        <li>
                            <a href="{{route('detail_product',[$cat=Str::slug($item->cat->name),$slug=Str::slug($item->name),$item->id])}}" title="" class="thumb">
                                <img src="{{url($image)}}" style="height:130px">
                            </a>
                            <a href="" title="" class="product-name">{{Str::limit($item->name,20)}}</a>
                            <div class="price">
                                <span class="new">{{number_format($item->price,0,'.','.')}}đ</span>
                                {{-- <span class="old">20.900.000đ</span> --}}
                            </div>
                            <div class="action clearfix">
                                <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>   
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            @include('layouts.sidebar')
             @include('layouts.sale')
        </div>
    </div>
</div>
@endsection