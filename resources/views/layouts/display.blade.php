<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{asset('display/css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('display/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('display/reset.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('display/css/carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('display/css/carousel/owl.theme.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('display/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('display/style.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('display/style.css')}}" rel="stylesheet" type="text/css"/>

        <script src="{{asset('display/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('display/js/elevatezoom-master/jquery.elevatezoom.js')}}" type="text/javascript"></script>
        <script src="{{asset('display/js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('display/js/carousel/owl.carousel.js')}}" type="text/javascript"></script>
        <script src="{{asset('display/js/main.js')}}" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="{{route('display.payment')}}" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="{{route('home')}}" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="{{route('display.product',$name='laptop')}}" title="">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="{{route('news')}}" title="">Tin tức công nghệ</a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{route('display.contact')}}" title="">Liên Hệ</a>
                                    </li>
                                    <li>
                                        <a href="{{route('display.intro')}}" title="">Giới thiệu</a>
                                    </li> --}}
                                    @if (empty($_COOKIE['username']))
                                   <li>
                                        <a href="{{route('display.reg')}}" title="">Đăng ký</a>
                                    </li>
                                    <li>
                                        <a href="{{route('display.login')}}" title="">Đăng nhập</a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="" title="">Quản lý tài khoản</a>
                                    </li>
                                    <li>
                                        <a href="{{route('display.logout')}}" title="">Đăng xuất</a>
                                    </li>
                                    @endif
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="{{route('home')}}" title="" id="logo" class="fl-left"><img src="{{asset('/images/logo.png')}}"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="{{route('display.validation_search_product')}}">
                                   @csrf
                                    <input style="color: red" type="text" name="search" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!" value="@error('search'){{$message}} @enderror">
                                    <button type="submit" id="sm-s">Tìm kiếm</button>
                                </form>
                            </div> 
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        @if (Cart::count()>0)
                                            <span id="num">{{Cart::count()}}</span>
                                        @endif
                                    </div>
                                    <div id="dropdown">
                                        <p class="desc">Có <span>{{Cart::count()}} sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                           @foreach (Cart::content() as $cart)
                                               <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="{{url($cart->options->img)}}" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name">Laptop Lenovo 10</a>
                                                    <p class="price">{{number_format($cart->price,0,'.','.')}}đ</p>
                                                    <p class="qty">Số lượng: <span>{{$cart->qty}}</span></p>
                                                </div>
                                            </li>
                                           @endforeach
                                            
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right">{{Cart::subTotal(0,'.','.')}}vnd</p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="{{Route('cart')}}" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="{{Route('display.payment')}}" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </dic>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="wp-content">
                    @yield('content')
               </div>
                <div id="footer-wp">
                    <div id="foot-body">
                        <div class="wp-inner clearfix">
                            <div class="block" id="info-company">
                                <h3 class="title">ISMART</h3>
                                <p class="desc">ISMART luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                                <div id="payment">
                                    <div class="thumb">
                                        <img src="public/images/img-foot.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="block menu-ft" id="info-shop">
                                <h3 class="title">Thông tin cửa hàng</h3>
                                <ul class="list-item">
                                    <li>
                                        <p>106 - Trần Bình - Cầu Giấy - Hà Nội</p>
                                    </li>
                                    <li>
                                        <p>0987.654.321 - 0989.989.989</p>
                                    </li>
                                    <li>
                                        <p>vshop@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="block menu-ft policy" id="info-shop">
                                <h3 class="title">Chính sách mua hàng</h3>
                                <ul class="list-item">
                                    <li>
                                        <a href="" title="">Quy định - chính sách</a>
                                    </li>
                                    <li>
                                        <a href="" title="">Chính sách bảo hành - đổi trả</a>
                                    </li>
                                    <li>
                                        <a href="" title="">Chính sách hội viện</a>
                                    </li>
                                    <li>
                                        <a href="" title="">Giao hàng - lắp đặt</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="block" id="newfeed">
                                <h3 class="title">Bảng tin</h3>
                                <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                                <div id="form-reg">
                                    <form method="POST" action="">
                                        <input type="email" name="email" id="email" placeholder="Nhập email tại đây">
                                        <button type="submit" id="sm-reg">Đăng ký</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="foot-bot">
                        <div class="wp-inner">
                            <p id="copyright">© Bản quyền thuộc về unitop.vn | Php Master</p>
                        </div>
                    </div>
                </div>
                </div>
                <div id="menu-respon">
                    <a href="?page=home" title="" class="logo">ISMART</a>
                    {{-- <div id="menu-respon-wp">
                        <ul class="" id="main-menu-respon">
                            @foreach ($product_cats as $product_cat)
                            @if (Str::substrcount($product_cat->branching,'.')==0)
                                <li>
                                    <a href="{{Route('display.product',['name'=>$name=Str::slug($product_cat->name)])}}" title="">{{$product_cat->name}}</a>
                                    <ul class="sub-menu" >
                                        @foreach ($product_cats as $cat)
                                        @if (Str::substrcount($cat->branching,'.')==1 &&floor($cat->branching)==$product_cat->branching)
                                        <li>
                                            <a href="{{Route('display.product',['name'=>$name=Str::slug($cat->name)])}}" title="">{{$cat->name}}</a>
                                           
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                          @endforeach
                        </ul>
                    </div>   --}}
               </div>
                <div id="btn-top"><img src="public/images/icon-to-top.png" alt=""/></div>
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
                </body>
                </html>