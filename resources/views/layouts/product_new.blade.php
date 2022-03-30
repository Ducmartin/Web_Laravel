<div class="section" id="feature-product-wp">
    <div class="section-head">
        <h3 class="section-title">Sản phẩm mới</h3>
    </div>
    <div class="section-detail">
        <ul class="list-item">
            @foreach ($product_news as $product_new)
            @php
                  foreach ($thumbnails as $thumbnail) {
                            if($thumbnail->product_id==$product_new->id){
                                $image=$thumbnail->thumbnail;
                                break;
                            }
                        }
            @endphp
                <li >
                <a href="{{route('detail_product',[$cat=$product_new->cat->slug,$slug=Str::slug($product_new->name),$product_new->id])}}" title="" class="thumb">
                    <img src="{{url($image)}}">
                </a>
                <a href="{{route('detail_product',[$cat=$product_new->cat->slug,$slug=Str::slug($product_new->name),$product_new->id])}}" title="" class="product-name">{{Str::limit($product_new->name,20)}}</a>
                <div class="price">
                    <span class="new">{{number_format($product_new->price,0,'.','.')}}đ</span>
                    {{-- <span class="old">20.900.000đ</span> --}}
                </div>
                <div class="action clearfix">
                    <a href="{{Route('addcart',$product_new->id)}}" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                    <a href="{{route('detail_product',[$cat=$product_new->cat->slug,$slug=Str::slug($product_new->name),$product_new->id])}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>