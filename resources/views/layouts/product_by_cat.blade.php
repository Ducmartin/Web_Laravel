
<div class="section" id="list-product-wp">
    @foreach ($product_by_cats as $item)
         <div class="section-head">
        <h3 class="section-title">{{$item->cat->name}}</h3>
    </div>
    <div class="section-detail">
        <ul class="list-item clearfix">
          
            @foreach ($products[$item->cat_id] as $product)
            @if ($product->cat_id==$item->cat_id)
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
                    <a href="{{Route('addcart',$product->id)}}" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                    <a href="{{route('detail_product',[$cat=$product->cat->slug,$slug=Str::slug(Str::limit($product->name,'30')),$product->id])}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                </div>
                </li> 
            @endif
            @endforeach
        </ul>
    </div>
    @endforeach
    {{-- {{$$product_by_cats->links()}} --}}
</div>
