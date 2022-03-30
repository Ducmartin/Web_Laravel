@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-success">
                {{session('delete')}}
            </div>
        @endif
        @if (session('edit'))
            <div class="alert alert-success">
                {{session('edit')}}
            </div>
        @endif
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách trang</h5>
            <div class="form-search form-inline">
                <form action="{{route('page.search')}}" method="GET">
                    <input type="text" name="search" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            @if (count($pages)>0)    
            <div class="analytic">
                <a href="{{route('page.list_page_public')}}" class="text-primary">Công khai<span class="text-muted">({{$public}})</span></a>
                <a href="{{route('page.list_page_approve')}}" class="text-primary">Chờ duyệt<span class="text-muted">({{$approve}})</span></a>
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $t=0
                    @endphp
                    @foreach ($pages as $page)
                    @php
                    $t++
                    @endphp
                        <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td scope="row">{{$t}}</td>
                        <td><a href="">{{$page->title}}</a></td>
                        <td>{{$page->created_at}}</td>
                        <td>{{$page->status->name}}</td>
                        <td><a href="{{route('page.edit',$page->id)}}" class="btn btn-success btn-sm rounded-0"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{route('page.delete',$page->id)}}" class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    @endforeach
                    
                </tbody>
            </table>
            @else
              <p class="text-center"><strong>Không có trang nào tồn tại trên hệ thống</strong></p>
            @endif
           {{$pages->links()}}
        </div>
    </div>
</div>
@endsection