<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_cat;
use App\Thumbnail_product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
  //
  function add()
  {
    $product_cats = Product_cat::all();
    return view('admin.product.add', compact('product_cats'));
  }
  function validation(Request $request)
  {
    $request->validate(
      [
        'name' => ['required', 'unique:products'],
        'price' => ['required'],
        'desc' => ['required'],
        'detail' => ['required'],
        'images' => ['required'],
        'cat_id' => ['required'],
        'status_id' => ['required'],
      ],
      [
        'name.unique' => 'Tên sản phẩm đã tồn tại',
        'cat_id.in' => 'Chọn :attribute',
        'required' => 'Không được để trống :attribute'
      ],
      [
        'name' => 'tên sản phẩm',
        'price' => 'giá sản phẩm',
        'desc' => 'mô tả sản phẩm',
        'detail' => 'chi tiết sản phẩm',
        'images' => 'ảnh của sản phẩm',
        'cat_id' => 'danh mục sản phẩm',
        'status_id' => 'trạng thái sản phẩm'
      ]

    );
    //  $data=$request->input();
    $data = $request->all();
    Product::create([
      'name' => $data['name'],
      'price' => $data['price'],
      'desc' => $data['desc'],
      'detail' => $data['detail'],
      'cat_id' => $data['cat_id'],
      'status_id' => $data['status_id']
    ]);
    $images = array();
    $id = Product::where('name', $data['name'])->first()->id;
    if ($files = $request->file('images')) {

      foreach ($files as $file) {
        $name = $file->getClientOriginalName();
        $file->move('public/uploads/products/', $name);
        $images[] = 'public/uploads/products/' . $name;
      }

      foreach ($images as $image) {
        Thumbnail_product::create(
          [
            'thumbnail' => $image,
            'product_id' => $id,
          ]
        );
      }
    }
    return redirect('product/list_product')->with('success', 'Đã thêm thành công sản phẩm!');
  }
  function validation_edit(Request $request, $id)
  {
    $request->validate(
      [
        'name' => ['required'],
        'price' => ['required'],
        'desc' => ['required'],
        'detail' => ['required'],
        'status_id' => ['required'],
      ],
      [
        'required' => 'Không được để trống :attribute'
      ],
      [
        'name' => 'tên sản phẩm',
        'price' => 'giá sản phẩm',
        'desc' => 'mô tả sản phẩm',
        'detail' => 'chi tiết sản phẩm',
        'images' => 'ảnh của sản phẩm',
        'cat_id' => 'danh mục sản phẩm',
        'status_id' => 'trạng thái sản phẩm'
      ]

    );
    $data = $request->all();
    Product::where('id', $id)->update([
      'name' => $data['name'],
      'price' => $data['price'],
      'desc' => $data['desc'],
      'detail' => $data['detail'],
      'cat_id' => $data['cat_id'],
      'status_id' => $data['status_id']
    ]);
    $images = array();
    $id = Product::where('name', $data['name'])->first()->id;
    if ($files = $request->file('images')) {

      foreach ($files as $file) {
        $name = $file->getClientOriginalName();
        $file->move('public/uploads/products/', $name);
        $images[] = 'public/uploads/products/' . $name;
      }

      foreach ($images as $image) {
        Thumbnail_product::create(
          [
            'thumbnail' => $image,
            'product_id' => $id,
          ]
        );
      }
    }
    return redirect('product/list_product')->with('edit', 'Đã thay đổi thành công sản phẩm!');
  }
  function list_product()
  {
    $products = Product::paginate('10');
    $yes = count(Product::where('status_id', 3)->get());
    $no = count(Product::where('status_id', 4)->get());
    $thumbnails = Thumbnail_product::all();
    return view('admin.product.list_product', compact('products', 'thumbnails', 'yes', 'no'));
  }
  function stocking()
  {
    $products = Product::where('status_id', 3)->paginate('10');
    $yes = count(Product::where('status_id', 3)->get());
    $no = count(Product::where('status_id', 4)->get());
    $thumbnails = Thumbnail_product::all();
    return view('admin.product.list_product', compact('products', 'thumbnails', 'yes', 'no'));
  }
  function out_of_stocking()
  {
    $products = Product::where('status_id', 4)->paginate('10');
    $yes = count(Product::where('status_id', 3)->get());
    $no = count(Product::where('status_id', 4)->get());
    $thumbnails = Thumbnail_product::all();
    return view('admin.product.list_product', compact('products', 'thumbnails', 'yes', 'no'));
  }
  function edit($id)
  {
    $product_cats = Product_cat::all();
    $product = Product::find($id);
    $thumbnails = Thumbnail_product::where('product_id', $id)->get();
    return view('admin.product.edit', compact('product', 'id', 'thumbnails', 'product_cats'));
  }

  function delete($id)
  {
    Product::find($id)->delete();
    return redirect('product/list_product')->with('delete', 'Đã xóa thành công sản phẩm!');
  }
  function list_cat()
  {
    $parent_cat = Product_cat::all();
    $product_cats = Product_cat::all();
    return view('admin.product.list_cat', compact('product_cats', 'parent_cat'));
  }
  function validation_addcat(Request $request)
  {
    $request->validate(
      [
        'name' => ['required', 'unique:product_cats'],
        'cat_parent' => ['required'],
        'status_id' => ['required'],
      ],
      [
        'required' => 'Không được để trống :attribute'
      ],
      [
        'name' => 'danh mục con',
        'cat_parent' => 'danh mục cha',
        'status_id' => 'trạng thái danh mục',
      ]

    );
    $data = $request->all();
    $id = $data['cat_parent'];
    Product_cat::create([
      'name' => $data['name'],
      'status_id' => $data['status_id'],
      'slug' => Str::slug(Product_cat::where('branching', $id)->first()->name) . '-' . Str::slug($data['name'])
    ]);
    return redirect('product/list_cat')->with('success', 'Đã thêm thành công danh mục sản phẩm!');
  }
  function search(Request $request)
  {
    $name = $request->search;
    $products = Product::where('name', $name)->paginate(10);
    $yes = count(Product::where('status_id', 3)->get());
    $no = count(Product::where('status_id', 4)->get());
    $thumbnails = Thumbnail_product::all();
    return view('admin.product.list_product', compact('products', 'thumbnails', 'yes', 'no', 'name'));
  }
}
