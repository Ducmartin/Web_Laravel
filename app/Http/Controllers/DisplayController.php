<?php

namespace App\Http\Controllers;

use App\Cart_customer;
use Illuminate\Support\Facades\URL;
use App\Order;
use App\Thumbnail_product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Post;
use App\User;
use App\Check_price;
use App\Customer;
use App\Product_cat;
use App\Slider;
use Gloudemans\Shoppingcart\Facades\Cart;;
class DisplayController extends Controller
{
  function home()
  {
    $product_cats = Product_cat::all();
    $sales = Order::selectraw('sum(num_order) as num_sales,product_id')->groupby('product_id')->get();
    foreach ($sales as $sale) {
      Product::where('id', $sale->product_id)->update(['sales' => $sale->num_sales]);
    }
    $num_sales = Product::orderby('sales', 'DESC')->limit(15)->get();
    $thumbnails = Thumbnail_product::all();
    $product_news = Product::orderby('id', 'DESC')->limit(10)->get();
    $product_by_cats = Product::selectraw('count(cat_id) as num_cat,cat_id')->groupBy('cat_id')->simplePaginate(2);
    $products = array();
    foreach ($product_by_cats as $product_by_cat) {
      $products[$product_by_cat->cat_id] = Product::where('cat_id', $product_by_cat->cat_id)->limit(8)->get();
    }
    $sliders=Slider::all();
    return view('display.home', compact('sliders','product_cats', 'num_sales', 'thumbnails', 'products', 'product_news', 'product_by_cats'));
  }
  function news(){
    $product_cats = Product_cat::all();
    $sales = Order::selectraw('sum(num_order) as num_sales,product_id')->groupby('product_id')->get();
    foreach ($sales as $sale) {
      Product::where('id', $sale->product_id)->update(['sales' => $sale->num_sales]);
    }
    $num_sales = Product::orderby('sales', 'DESC')->limit(15)->get();
    $thumbnails = Thumbnail_product::all();
    $posts=Post::where(['cat_id'=>5,'status_id'=>2])->paginate(10);
    return view('display.news', compact('posts','product_cats', 'num_sales', 'thumbnails', 'products', 'product_news'));
  }
  function detail_news($name,$id){
    $product_cats = Product_cat::all();
    $sales = Order::selectraw('sum(num_order) as num_sales,product_id')->groupby('product_id')->get();
    foreach ($sales as $sale) {
      Product::where('id', $sale->product_id)->update(['sales' => $sale->num_sales]);
    }
    $num_sales = Product::orderby('sales', 'DESC')->limit(15)->get();
    $thumbnails = Thumbnail_product::all();
    $post=Post::where('id',Str::of($id)->afterLast('-'))->first();
    return view('display.detail_news', compact('post','product_cats', 'num_sales', 'thumbnails', 'products','product_news'));
  }
  function check_product(Request $request)
  {
    if (!empty($request->trademark) && empty($request->price)) {
      $name = Product_cat::where('id', $request->trademark)->first()->slug;
      return redirect()->route('display.product', $name);
    }
    if (!empty($request->trademark) && !empty($request->price)) {
      $name = Product_cat::where('id', $request->trademark)->first()->slug;
      $price = Str::slug(Check_price::find($request->price)->name);
      return redirect()->route('display.product', ['name' => $name, 'price' => $price]);
    }
  }
  function validation_search_product(Request $request)
  {
    $request->validate(
      [
        'search' => ['required']
      ],
      [
        'required' => "Vui l??ng nh???p t??n s???n ph???m c???n :attribute"
      ],
      [
        'search' => "t??m ki???m"
      ]
    );
    $key = $request->search;
    return redirect()->route('display.search_product', $key);
  }
  function search_product($key)
  {
    $products = Product::where('name', 'like', '%' . $key . '%')->paginate(10);
    $product_by_cats = Product::where('name', 'like', '%' . $key . '%')->paginate(10);
    $name = $key;
    $thumbnails = Thumbnail_product::all();
    $product_cats = Product_cat::all();
    $check_prices = Check_price::all();
    return view('display.category_product', compact(
      'products',
      'product_by_cats',
      'name',
      'thumbnails',
      'product_cats',
      'check_prices'
    ));
  }
  function orderby(Request $request, $name)
  {
    if ($request->orderby == 0) {
      return redirect()->route('display.product', ['name' => $name]);
    } else if ($request->orderby == 1) {
      $orderby = Str::slug('Gi?? gi???m d???n');
      return redirect()->route('display.product', ['name' => $name, 'orderby' => $orderby]);
    } else {
      $orderby = Str::slug('Gi?? t??ng d???n');
      return redirect()->route('display.product', ['name' => $name, 'orderby' => $orderby]);
    }
  }
  function product($name)
  {
    $product_cats = Product_cat::all();
    $sales = Order::selectraw('sum(num_order) as num_sales,product_id')->groupby('product_id')->get();
    foreach ($sales as $sale) {
      Product::where('id', $sale->product_id)->update(['sales' => $sale->num_sales]);
    }
    $num_sales = Product::orderby('sales', 'DESC')->limit(5)->get();
    $thumbnails = Thumbnail_product::all();
    $product_news = Product::orderby('id', 'DESC')->limit(10)->get();
    ///ph???n c???n thay ?????i
    $price = Str::after(URL::full(), 'price=');
    $orderby = Str::after(URL::full(), 'orderby=');
    if ($orderby == 'gia-tang-dan') {
      $product_by_cats = Product::where('cat_id', Product_cat::where('slug', $name)->first()->id)->orderby('price', 'ASC')->simplePaginate(16);
      $products = Product::where('cat_id', Product_cat::where('slug', 'Like', $name)->first()->id)->get();
      $cat = Product_cat::where('slug', $name)->first();
      $trademarks = Product_cat::where('slug', 'like', '%' . $name . '%')->get();
      $check_prices = Check_price::all();
      return view('display.category_product', compact('check_prices', 'trademarks', 'num_sales', 'thumbnails', 'cat', 'product_cats', 'name', 'product_by_cats', 'products', 'orderby'));
    } else if ($orderby == 'gia-giam-dan') {
      $product_by_cats = Product::where('cat_id', Product_cat::where('slug', $name)->first()->id)->orderby('price', 'DESC')->simplePaginate(16);
      $products = Product::where('cat_id', Product_cat::where('slug', 'Like', $name)->first()->id)->get();
      $cat = Product_cat::where('slug', $name)->first();
      $trademarks = Product_cat::where('slug', 'like', '%' . $name . '%')->get();
      $check_prices = Check_price::all();
      return view('display.category_product', compact('check_prices', 'trademarks', 'num_sales', 'thumbnails', 'cat', 'product_cats', 'name', 'product_by_cats', 'products', 'orderby'));
    }
    if (empty(Check_price::where('slug', 'like', '%' . $price . '%')->first()->id)) {
      $product_by_cats = Product::where('cat_id', Product_cat::where('slug', $name)->first()->id)->simplePaginate(16);
      $products = Product::where('cat_id', Product_cat::where('slug', 'Like', $name)->first()->id)->get();
      $cat = Product_cat::where('slug', $name)->first();
      $trademarks = Product_cat::where('slug', 'like', '%' . $name . '%')->get();
      $check_prices = Check_price::all();
      return view('display.category_product', compact('check_prices', 'trademarks', 'num_sales', 'thumbnails', 'cat', 'product_cats', 'name', 'product_by_cats', 'products'));
    } else {
      $option_price = Check_price::where('slug', 'like', '%' . $price . '%')->first()->id;
      if ($option_price == 1) {
        $product_by_cats = Product::where([
          ['cat_id', Product_cat::where('slug', $name)->first()->id], ['price', '<', 2000000]
        ])->simplePaginate(16);
        $products = Product::where([
          ['cat_id', Product_cat::where('slug', $name)->first()->id], ['price', '<', 2000000]
        ])->get();
      }
      if ($option_price == 2) {
        $product_by_cats = Product::where([
          ['cat_id', Product_cat::where('slug', $name)->first()->id], ['price', '<', 5000000]
        ])->orderby('price', 'desc')->simplePaginate(16);
        $products = Product::where([
          ['cat_id', Product_cat::where('slug', $name)->first()->id], ['price', '<', 5000000]
        ])->get();
      }
      if ($option_price == 3) {
        $product_by_cats = Product::where([
          ['cat_id', Product_cat::where('slug', $name)->first()->id], ['price', '<', 10000000]
        ])->orderby('price', 'desc')->simplePaginate(16);
        $products = Product::where([
          ['cat_id', Product_cat::where('slug', $name)->first()->id], ['price', '<', 10000000]
        ])->get();
      }
      if ($option_price == 4) {
        $product_by_cats = Product::where([
          ['cat_id', Product_cat::where('slug', $name)->first()->id], ['price', '<', 20000000]
        ])->orderby('price', 'desc')->simplePaginate(16);
        $products = Product::where([
          ['cat_id', Product_cat::where('slug', $name)->first()->id], ['price', '<', 20000000]
        ])->get();
      }
      if ($option_price == 5) {
        $product_by_cats = Product::where([
          ['cat_id', Product_cat::where('slug', $name)->first()->id], ['price', '>', 20000000]
        ])->simplePaginate(16);
        $products = Product::where([
          ['cat_id', Product_cat::where('slug', $name)->first()->id], ['price', '>', 20000000]
        ])->get();
      }
      $cat = Product_cat::where('slug', $name)->first();
      $trademarks = Product_cat::where('slug', 'like', '%' . $name . '%')->get();
      $check_prices = Check_price::all();
      return view('display.category_product', compact(
        'check_prices',
        'price',
        'name',
        'trademarks',
        'num_sales',
        'thumbnails',
        'cat',
        'product_cats',
        'name',
        'product_by_cats',
        'products'
      ));
    }
  }
  function detail_product($cat, $product, $id)
  {
    $product_cats = Product_cat::all();
    $sales = Order::selectraw('sum(num_order) as num_sales,product_id')->groupby('product_id')->get();
    foreach ($sales as $sale) {
      Product::where('id', $sale->product_id)->update(['sales' => $sale->num_sales]);
    }
    $num_sales = Product::orderby('sales', 'DESC')->limit(10)->get();
    $cat_id = Product_cat::where('slug', $cat)->first();
    $product = Product::find($id);
    $avatar = Thumbnail_product::where('product_id', $id)->first()->thumbnail;
    $thumbnail = Thumbnail_product::where('product_id', $id)->get();
    $thumbnails = Thumbnail_product::all();
    $product_by_cat = Product::where('cat_id', $cat_id->id)->orderby('sales', 'desc')->limit(10)->get();
    return view('display.detail_product', compact('product_by_cat', 'product', 'thumbnail', 'cat_id', 'thumbnails', 'avatar', 'product_cats', 'num_sales'));
  }
  function reg()
  {
    return view('display.reg');
  }
  function login()
  {
    return view('display.login');
  }
  function logout()
  {
    setcookie('username', '', time() - 3600);
    Cart::destroy();
    return redirect()->route('home');
  }
  function payment()
  {
    if (isset($_COOKIE['username'])) {
      $customer = Customer::where('username', $_COOKIE['username'])->first();
      return view('display.checkout', compact('customer'));
    } else {
      return redirect()->route('display.login')->with('login', 'Vui l??ng ????ng nh???p t??i kho???n c???a b???n tr?????c khi mua h??ng!!');
    }
  }
  function cart()
  {
    if (isset($_COOKIE['username'])) {
      return view('display.cart');
    } else {
      return redirect()->route('display.login')->with('login', 'Vui l??ng ????ng nh???p t??i kho???n c???a b???n tr?????c khi mua h??ng!!');
    }
  }
  function validation_user_reg(Request $request)
  {
    $request->validate(
      [
        'username' => ['required', 'unique:customers'],
        'password' => ['required'],
        'email' => ['required', 'unique:customers'],
        'phone_number' => ['required', 'unique:customers'],
      ],
      [
        'required' => "Vui l??ng nh???p :attribute c???a b???n",
        'unique' => ":attribute ???? t???n t???i vui l??ng ch???n 1 t??n kh??c",
      ],
      [
        'username' => "t??n ????ng nh???p",
        'password' => 'm???t kh???u',
        'email' => '?????a ch??? email',
        'phone_number' => 's??? ??i???n tho???i'
      ]
    );
    Customer::create([
      'username' => $request->username,
      'password' => $request->password,
      'email' => $request->email,
      'phone_number' => $request->phone_number,
    ]);
    return redirect()->route('display.login')->with('success', "B???n ???? ????ng k?? t??i kho???n th??nh c??ng!!!");
  }
  function order(Request $request)
  {
    $request->validate(
      [
        'fullname' => ['required'],
        'address' => ['required'],
        'email' => ['required'],
        'phone_number' => ['required'],
        'payment_method' => ['required'],
      ],
      [
        'required' => "Vui l??ng nh???p :attribute c???a b???n"
      ],
      [
        'email' => '?????a ch??? email',
        'phone_number' => 's??? ??i???n tho???i',
        'fullname' => 'h??? v?? t??n',
        'payment_method' => 'ph????ng th???c thanh to??n',
        'address' => '?????a ch???'
      ]
    );
    $customer = Customer::where('username', $_COOKIE['username'])->first();
    Customer::where('username', $_COOKIE['username'])->update([
      'email' => $request->email,
      'fullname' => $request->fullname,
      'address' => $request->address,
      'phone_number' => $request->phone_number,
    ]);
    foreach (Cart::content() as $product) {
      if ($request->payment_method == 1) {
        $method = "Thanh to??n t???i c???a h??ng";
      } else if ($request->payment_method == 2) {
        $method = "Thanh to??n t???i nh??";
      }
      Order::create([
        'num_order' => $product->qty,
        'product_id' => $product->id,
        'status_id' => 5,
        'note' => $request->note,
        'customer_id' => $customer->id,
        'payment' => $method,
      ]);
      Cart::remove($product->rowId);
    }
    return redirect()->route("cart")->with('success', '???? ?????t h??ng th??nh c??ng!!!');
  }
  function validation_login(Request $request)
  {
    $url = $request->url;
    $request->validate([
      'username' => ['required'],
      'password' => ['required'],
    ], [
      'required' => 'Vui l??ng nh???p :attribute'
    ], [
      'username' => 't??n ????ng nh???p',
      'password' => 'm???t kh???u'
    ]);
    $customer = Customer::where([['username', $request->username], ['password', $request->password]])->first();
    if (!empty($customer)) {
      setcookie('username', $request->username, time() + 3600);
      if ($url == "http://localhost/unimart/dang-ky") {
        $url = "http://localhost/unimart/";
      }
      foreach (Cart_customer::where('customer_id', $customer->id)->get() as $cart) {
        $product = Product::where('id', $cart->product_id)->first();
        $img = Thumbnail_product::where('product_id', $cart->product_id)->first();
        Cart::add(['id' => $cart->product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['img' => $img->thumbnail, 'cat' => $product->cat->slug]]);
      }
      return redirect($url);
    } else {
      return redirect()->route('display.login')->with('fail', 'Sai m???t kh???u ho???c t??n ????ng nh???p kh??ng ????ng!!');
    }
  }
  function addcart($id)
  {
    if (isset($_COOKIE['username'])) {
      $product = Product::where('id', $id)->first();
      $img = Thumbnail_product::where('product_id', $id)->first();
      $customer = Customer::where('username', $_COOKIE['username'])->first();
      Cart_customer::create([
        'customer_id' => $customer->id,
        'product_id' => $id,
        'qty' => 1,
      ]);
      Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['img' => $img->thumbnail, 'cat' => $product->cat->slug]]);
      return redirect()->route('cart');
    } else {
      return redirect()->route('display.login')->with('login', 'Vui l??ng ????ng nh???p t??i kho???n c???a b???n tr?????c khi mua h??ng!!');
    }
  }
  function removecart($id)
  {
    $product_id = Cart::get($id)->id;
    $customer = Customer::where('username', $_COOKIE['username'])->first();
    Cart_customer::where([['customer_id', $customer->id], ['product_id', $product_id]])->delete();
    Cart::remove($id);
    return redirect()->route('cart');
  }
  function value_order(Request $request)
  {
    if (isset($_COOKIE['username'])) {
      foreach (Cart::content() as $cart) {
        if ($request->product == $cart->id) {
          $qty = $cart->qty;
          Cart::update($cart->rowId, ['qty' => $request->num_order + $qty]);
          return redirect()->route("cart");
        }
      }
      $id = $request->product;
      $product = Product::where('id', $id)->first();
      $img = Thumbnail_product::where('product_id', $id)->first();
      Cart::add(['id' => $id, 'name' => $product->name, 'qty' => $request->num_order, 'price' => $product->price, 'options' => ['img' => $img->thumbnail, 'cat' => $product->cat->slug]]);
      return redirect()->route('cart');
    } else {
      return redirect()->route('display.login')->with('login', 'Vui l??ng ????ng nh???p t??i kho???n c???a b???n tr?????c khi mua h??ng!!');
    }
  }

}
