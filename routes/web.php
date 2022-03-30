<?php

use App\User;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Login;
use UniSharp\LaravelFilemanager\LaravelFilemanagerServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['auth']],function(){
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('page/add', 'PageController@add')->name('page.add');
Route::get('page/list', 'PageController@list')->name('page.list');
Route::get('post/add', 'PostController@add')->name('post.add');
Route::get('post/list_post', 'PostController@list_post')->name('post.list_post');
Route::get('product/add', 'ProductController@add')->name('product.add');
Route::get('product/list_product', 'ProductController@list_product')->name('product.list_product');
Route::get('product/list_cat', 'ProductController@list_cat')->name('product.list_cat');
Route::get('order/list_order', 'OrderController@list_order')->name('order.list_order');
///user
Route::get('user/add', 'UserController@add')->name('user.add');
Route::get('user/list_user_enable', 'UserController@list_user_enable')->name('user.list_user_enable');
Route::get('user/list_user_disable', 'UserController@list_user_disable')->name('user.list_user_disable');
//validation user/edit/validation
Route::post('user/validation', 'UserController@validation')->name('user.validation');
Route::post('user/update/{id}', 'UserController@update')->name('user.update');
Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::get('user/delete/{id}', 'UserController@delete')->name('user.delete');
Route::get('user/permanently_delete/{id}', 'UserController@permanently_delete')->name('user.permanently_delete');
Route::get('user/restore/{id}', 'UserController@restore')->name('user.restore');
//tìm kiếm user
Route::get('user/search/', 'UserController@search')->name('user.search');
//page
Route::get('page/add', 'PageController@add')->name('page.add');
Route::post('page/validation', 'PageController@validation')->name('page.validation');
Route::get('page/list_page', 'PageController@list')->name('page.list_page');
Route::get('page/edit/{id}', 'PageController@edit')->name('page.edit');
Route::get('page/delete/{id}', 'PageController@delete')->name('page.delete');
Route::post('page/validation_edit/{id}', 'PageController@validation_edit')->name('page.validation_edit');
Route::get('page/list_page_approve', 'PageController@list_page_approve')->name('page.list_page_approve');
Route::get('page/list_page_public', 'PageController@list_page_public')->name('page.list_page_public');
//tìm kiếm page
Route::get('page/search/', 'PageController@search')->name('page.search');
///product
Route::get('product/add', 'ProductController@add')->name('product.add');
Route::get('product/stocking', 'ProductController@stocking')->name('product.stocking');
Route::get('product/out_of_stocking', 'ProductController@out_of_stocking')->name('product.out_of_stocking');
Route::get('product/delete/{id}', 'ProductController@delete')->name('product.delete');
Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::get('product/list_product', 'ProductController@list_product')->name('product.list_product');
Route::post('product/validation_addcat', 'ProductController@validation_addcat')->name('product.validation_addcat');
Route::post('product/validation', 'ProductController@validation')->name('product.validation');
Route::post('product/validation_edit/{id}', 'ProductController@validation_edit')->name('product.validation_edit');
Route::get('product/search/', 'ProductController@search')->name('product.search');
////post
Route::post('post/validation_edit/{id}', 'PostController@validation_edit')->name('post.validation_edit');
Route::post('post/validation_addcat', 'PostController@validation_addcat')->name('post.validation_addcat');
Route::get('post/add', 'PostController@add')->name('post.add');
Route::get('post/pending', 'PostController@pending')->name('post.pending');
Route::get('post/public', 'PostController@public')->name('post.public');
Route::get('post/list_cat', 'PostController@list_cat')->name('post.list_cat');
Route::get('post/list_post', 'PostController@list_post')->name('post.list_post');
Route::post('post/validation', 'PostController@validation')->name('post.validation');
Route::get('post/search/', 'PostController@search')->name('post.search');
Route::get('post/delete/{id}', 'PostController@delete')->name('post.delete');
Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
///order
Route::get('order/processing', 'OrderController@processing')->name('order.processing');
Route::get('order/complete', 'OrderController@complete')->name('order.complete');
Route::get('order/search/', 'OrderController@search')->name('order.search');
Route::get('order/delete/{id}', 'OrderController@delete')->name('order.delete');
Route::get('order/edit/{id}', 'OrderController@edit')->name('order.edit');
Route::post('order/validation', 'OrderController@validation')->name('order.validation');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
//slider
Route::get('slider/add', 'Slidercontroller@add')->name('slider.add');
Route::get('slider/list', 'Slidercontroller@list')->name('slider.list');
Route::get('slider/delete/{id}', 'Slidercontroller@delete')->name('slider.delete');
Route::post('slider/validation_slider', 'Slidercontroller@validation_slider')->name('validation_slider');
});
////////////-----------------------DISPLAY--------------------------////////
Route::get('san-pham-{name}', 'DisplayController@product')->name('display.product');
// Route::get('gioi-thieu','DisplayController@intro')->name('display.intro');
// Route::get('lien-he','DisplayController@contact')->name('display.contact');
Route::post('display/check_product', 'DisplayController@check_product')->name('display.check_product');
Route::post('display/search_product', 'DisplayController@validation_search_product')->name('display.validation_search_product');
route::get('tim-kiem-{product}', 'DisplayController@search_product')->name('display.search_product');
Route::post('orderby/{name}', 'DisplayController@orderby')->name('display.orderby');
route::get('{cat}/{product}/{id}', 'DisplayController@detail_product')->name('detail_product');
Route::get('dang-nhap', 'DisplayController@login')->name('display.login');
Route::get('dang-ky', 'DisplayController@reg')->name('display.reg');

Route::get('gioi-hang', 'DisplayController@cart')->name('cart');
Route::post('reg', 'DisplayController@validation_user_reg')->name('validation_user_reg');
Route::post('validation_login', 'DisplayController@validation_login')->name('validation_login');
Route::get('them-vao-gio-hang-{product}', 'DisplayController@addcart')->name('addcart');
Route::get('remove-{rowId}', 'DisplayController@removecart')->name('removecart');
Route::get('thanh-toan', 'DisplayController@payment')->name('display.payment');
Route::get('dang-xuat', 'DisplayController@logout')->name('display.logout');
Route::post('sp', 'DisplayController@value_order')->name('value_order');
Route::post('order', 'DisplayController@order')->name('order');
Route::get('tin-tuc-cong-nghe', 'DisplayController@news')->name('news');
Route::get('{name}-{id}', 'DisplayController@detail_news')->name('detail_news');
Auth::routes();
Route::get('/', 'DisplayController@home')->name('home');
