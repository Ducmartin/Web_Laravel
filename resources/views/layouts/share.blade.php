<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <title>Admintrator</title>
</head>

<body>
    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-white d-flex">
            <div class="navbar-brand"><a href="?">UNITOP ADMIN</a></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('post.add')}}">Thêm bài viết</a>
                        <a class="dropdown-item" href="{{route('product.add')}}">Thêm sản phẩm</a>
                        <a class="dropdown-item" href="{{route('order.list_order')}}">Thêm đơn hàng</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{Auth::user()->name}}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="">Tài khoản</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                             </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                             </form>

                    </div>
                </div>
            </div>
        </nav>
        <!-- end nav  -->
        <div id="page-body" class="d-flex">
            <div id="sidebar" class="bg-white">
                <ul id="sidebar-menu">
                    @role('admin')
                      <li class="nav-link">
                        <a href="{{route('dashboard')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Dashboard
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                    </li>
                    @endrole
                    @hasanyrole('wrinter|admin')
                    <li class="nav-link">
                        <a href="{{route('page.list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Trang
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu ">
                            <li><a href="{{route('page.add')}}">Thêm mới</a></li>
                            <li><a href="{{route('page.list')}}">Danh sách</a></li>
                        </ul>
                    </li>
                    @endhasanyrole
                    @hasanyrole('wrinter|admin')
                   <li class="nav-link">
                        <a href="{{route('post.list_post')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Bài viết
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{route('post.add')}}">Thêm mới</a></li>
                            <li><a href="{{route('post.list_post')}}">Danh sách</a></li>
                            {{-- <li><a href="{{route('post.list_cat')}}">Danh mục</a></li> --}}
                        </ul>
                    </li>
                    @endhasanyrole
                    @hasanyrole('wrinter|admin')
                     <li class="nav-link">
                        <a href="{{route('product.list_product')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Sản phẩm
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{route('product.add')}}">Thêm mới</a></li>
                            <li><a href="{{route('product.list_product')}}">Danh sách</a></li>
                            <li><a href="{{route('product.list_cat')}}">Danh mục</a></li>
                        </ul>
                    </li>
                    @endhasanyrole
                    @hasanyrole('sales|admin')
                    <li class="nav-link">
                        <a href="{{route('order.list_order')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Bán hàng
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{route('order.list_order')}}">Đơn hàng</a></li>
                        </ul>
                    </li>
                    @endhasanyrole
                    @hasanyrole('admin')
                     <li class="nav-link">
                        <a href="{{route('user.list_user_enable')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Users
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{route('user.add')}}">Thêm mới</a></li>
                            <li><a href="{{route('user.list_user_enable')}}">Danh sách</a></li>
                        </ul>
                    </li>
                    @endhasanyrole
                    @hasanyrole('design|admin')
                    <li class="nav-link">
                        <a href="">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Slider
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{route('slider.add')}}">Thêm mới</a></li>
                            <li><a href="{{route('slider.list')}}">Danh sách</a></li>
                        </ul>
                    </li>
                    @endhasanyrole
                    

                </ul>
            </div>
          
        </div>
        <div id="wp-content">
            @yield('content')
       </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('admin/js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>