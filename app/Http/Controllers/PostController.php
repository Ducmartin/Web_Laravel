<?php

namespace App\Http\Controllers;

use App\Post;
use App\Page;
use App\Post_cat;
use Illuminate\Http\Request;

class PostController extends Controller
{

  function add()
  {
    $cats = Page::all();
    return view('admin.post.add', compact('cats'));
  }
  function validation(Request $request)
  {
    $request->validate(
      [
        'title' => ['required'],
        'content' => ['required'],
        'cat_id' => ['required'],
        'status_id' => ['required'],
        'img' => ['required']
      ],
      [
        'title.unique' => 'Tên sản phẩm đã tồn tại',
        'required' => 'Không được để trống :attribute'
      ],
      [
        'title' => 'tiêu đề bài viết',
        'content' => 'nội dung bài viết',
        'cat_id' => 'danh mục bài viết',
        'status_id' => 'trạng thái bài viết',
        'img' => 'ảnh đại diện bài viết'
      ]
    );
      $data = $request->all();
    if ($file = $request->file('img')) {
      $name = $file->getClientOriginalExtension();
      if ($name == 'jpg' || $name == 'png') {
        $name = $file->getClientOriginalName();
        $file->move('public/uploads/posts/', $name);
        $images = 'public/uploads/posts/'.$name;
        Post::create([
          'img' =>$images,
          'title' => $data['title'],
          'content' => $data['content'],
          'cat_id' => $data['cat_id'], 
          'status_id' => $data['status_id']
        ]);
        return redirect('post/list_post')->with('success', 'Đã thêm thành công bài viết!');
      } else {
        return redirect()->route('post.add')->with('fail', 'Vui lòng chọn file là 1 hình ảnh!!!');
      }
    }
  }
  function list_post()
  {
    $posts = Post::paginate('10');
    $pages = Page::all();
    $yes = count(Post::where('status_id', 1)->get());
    $no = count(Post::where('status_id', 2)->get());
    return view('admin.post.list_post', compact('posts', 'yes', 'no', 'pages'));
  }
  function pending()
  {
    $posts = Post::where('status_id', 1)->paginate('10');
    $yes = count(Post::where('status_id', 1)->get());
    $no = count(Post::where('status_id', 2)->get());
    return view('admin.post.list_post', compact('posts', 'yes', 'no'));
  }
  function public()
  {
    $posts = Post::where('status_id', 2)->paginate('10');
    $yes = count(Post::where('status_id', 1)->get());
    $no = count(Post::where('status_id', 2)->get());
    return view('admin.post.list_post', compact('posts', 'yes', 'no'));
  }
  function search(Request $request)
  {
    $name = $request->search;
    $posts = Post::where('title', $name)->paginate(10);
    $yes = count(Post::where('status_id', 1)->get());
    $no = count(Post::where('status_id', 2)->get());
    return view('admin.Post.list_post', compact('posts', 'yes', 'no', 'name'));
  }
  function delete($id)
  {
    Post::find($id)->delete();
    return redirect('post/list_post')->with('delete', 'Đã xóa thành công bài viết!');
  }
  function edit($id)
  {
    $post = Post::find($id)->first();
    return view('admin.post.edit', compact('post', 'id'));
  }
  function validation_edit(Request $request, $id)
  {
    $request->validate(
      [
        'title' => ['required'],
        'content' => ['required'],
        'cat_id' => ['required', 'in:1,2'],
        'status_id' => ['required'],
      ],
      [
        'title.unique' => 'Tên sản phẩm đã tồn tại',
        'cat_id.in' => 'Chọn :attribute',
        'required' => 'Không được để trống :attribute'
      ],
      [
        'title' => 'tiêu đề bài viết',
        'content' => 'nội dung bài viết',
        'cat_id' => 'danh mục bài viết',
        'status_id' => 'trạng thái bài viết'
      ]
    );
    $data = $request->all();
    Post::updated([
      'title' => $data['title'],
      'content' => $data['content'],
      'cat_id' => $data['cat_id'],
      'status_id' => $data['status_id']
    ]);
    return redirect('post/list_post')->with('edit', 'Đã chỉnh sửa thành công bài viết!');
  }
}
