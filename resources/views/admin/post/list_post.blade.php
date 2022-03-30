@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        @if(session('delete'))
        <div class="alert alert-success">
            {{session('delete')}}
        </div>
        @endif
        @if(session('edit'))
        <div class="alert alert-success">
            {{session('edit')}}
        </div>
        @endif
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách bài viết</h5>
            <div class="form-search form-inline">
                <form action="{{route('post.search')}}" method="GET">
                    <input type="text" name="search" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{route('post.pending')}}" class="text-primary">Chờ duyệt<span class="text-muted">({{$yes}})</span></a>
                <a href="{{route('post.public')}}" class="text-primary">Công khai<span class="text-muted">({{$no}})</span></a>
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            @if (count($posts)>0)
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $t=0;   
                   @endphp
                   @foreach ($posts as $post)
                   @php
                   $t++   
                  @endphp
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td scope="row">{{$t}}</td>
                            <td><a href="">{{ucwords($post->title)}}</a></td>
                            @foreach ($pages as $page)
                            @if ($post->cat_id==$page->id)
                                  <td>{{$page->title}}</td>
                            @endif
                            @endforeach
                            <td>{{$post->status->name}}</td>
                            <td>{{$post->created_at}}</td>
                            <td><a href="{{route('post.edit',$post->id)}}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{route('post.delete',$post->id)}}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
              <p class="text-center">Không tìm thấy bài viết nào trong danh sách sản phẩm</p>
            @endif
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection