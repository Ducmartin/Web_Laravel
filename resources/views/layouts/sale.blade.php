<div class="section" id="selling-wp">
    <div class="section-head">
        <h3 class="section-title">Sản phẩm bán chạy</h3>
    </div>
    <div class="section-detail">
        <ul class="list-item">
           @foreach ($num_sales as $sale)
           @php
                 foreach ($thumbnails as $thumbnail) {
                           if($thumbnail->product_id==$sale->id){
                               $image=$thumbnail->thumbnail;
                               break;
                           }
                       }
           @endphp
               <li class="clearfix">
               <a  href="{{route('detail_product',[$cat=$sale->cat->slug,$slug=Str::slug($sale->name),$sale->id])}}" title="" class="thumb fl-left">
                   <img  src="{{url($image) }}" alt="" style="width: 72px;
                   height: 58px;" >
               </a>
               <div class="info fl-right">
                   <a href="{{route('detail_product',[$cat=$sale->cat->slug,$slug=Str::slug($sale->name),$sale->id])}}" title="" class="product-name">{{$sale->name}}</a>
                   <div class="price">
                       <span class="new">{{number_format($sale->price,'0','.','.')}}đ</span>
                       {{-- <span class="old">7.190.000đ</span> --}}
                   </div>
                   <a href="{{route('detail_product',[$cat=$sale->cat->slug,$slug=Str::slug($sale->name),$sale->id])}}" title="" class="buy-now">Mua ngay</a>
               </div>
               </li>
           @endforeach
        </ul>
    </div>
</div>