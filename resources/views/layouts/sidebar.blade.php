<div class="section" id="category-product-wp">
    <div class="section-head">
        <h3 class="section-title">Danh mục sản phẩm</h3>
    </div>
    <div class="secion-detail">
        <ul class="list-item">
           
            @foreach ($product_cats as $product_cat)
            @if ($product_cat->slug==Str::slug($product_cat->name))
                <li>
                    <a href="{{Route('display.product',['name'=>$name=Str::slug($product_cat->name)])}}" title="">{{$product_cat->name}}</a>
                    <ul class="sub-menu" >
                        @foreach ($product_cats as $cat)
                        @if (Str::startsWith($cat->slug,$product_cat->slug)==true &&$product_cat->name!=$cat->name)
                        <li>
                            <a href="{{route('display.product',['name'=>$name=Str::slug($product_cat->name).'-'.Str::slug($cat->name)])}}" title="">{{$cat->name}}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </li>
            @endif
                 
            @endforeach
               
        </ul>
    </div>
</div>