@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách thành viên</h5>
            <div class="form-search form-inline">
                {!! Form::open(['route'=>['user.search'],'method'=>'GET']) !!}
                {!! Form::text('search','', ['class'=>'form-control form-search','placeholder'=>'Tìm kiếm']) !!}
                {!! Form::submit('Tìm kiếm', ['class'=>'btn btn-primary']) !!}
                {{-- <input type="submit" name="btn-search" value="Tìm kiếm" class=""> --}}
                 {!! Form::close() !!}
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{route('user.list_user_enable')}}" class="text-primary">kích hoạt<span class="text-muted">({{$users_enable}})</span></a>
                <a href="{{route('user.list_user_disable')}}" class="text-primary">vô hiệu hóa<span class="text-muted">({{$users_disable}})</span></a>
            </div>
            @if (count($users)>0)  
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
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                     $t=0;   
                    @endphp
                    @foreach ($users as $user)
                     @php
                        $t++; 
                     @endphp
                         <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <th scope="row">{{$t}}</th>
                        <td>{{$user->fullname}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @php
                        $k=""; 
                         foreach ($roles as $role){
                             if($role->model_id==$user->id){
                                 $k=$k.$role->role->name.',';
                             }
                         } 
                      @endphp
                      <td>{{$k}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <a href="@if($user->deleted_at!=NULL){{route('user.restore',$user->id)}}
                                @else {{route('user.edit',$user->id)}}
                                @endif
                                "  class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="@if($user->deleted_at!=NULL){{route('user.permanently_delete',$user->id)}}
                                @else {{route('user.delete',$user->id)}}
                                @endif" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="container">
                  <p class="text-center">Không có tài khoản <strong>{{$search}}</strong>  nào tồn tại trong hệ thống </p> 
            </div> 
            @endif
            {{$users->links()}}
        </div>      
    </div>
</div>
@endsection