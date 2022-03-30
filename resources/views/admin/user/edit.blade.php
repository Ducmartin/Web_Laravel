@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm người dùng
        </div>
        <div class="card-body">
          {!! Form::open(['route' => ['user.update', $user->id],'method'=>'POST']) !!}
                <div class="form-group">
                    {!! Form::label('username','Tên đăng nhập', []) !!}
                  {!! Form::text('username',$user->name, ['class'=>'form-control','id'=>'username']) !!}
                    @error('username')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('fullname','Họ và tên', []) !!}
                  {!! Form::text('fullname',$user->fullname, ['class'=>'form-control','id'=>'fullname']) !!}
                    @error('fullname')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email', []) !!}
                    {!! Form::email('email',$user->email, ['class'=>'form-control','id'=>'email']) !!}
                    @error('email')
                    <small class="form-text text-danger">{{$message}}</small>
                     @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Mật khẩu', []) !!}
                    {!! Form::password('password', ['class'=>'form-control','id'=>'password']) !!}
                    @error('password')
                    <small class="form-text text-danger">{{$message}}</small>
                   @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('role', 'Quyền', []) !!}
                    {!! Form::select('role',[0=>'Chọn quyền',1=>'administrator',2=>'editor'],$user->role_id, ['class'=>'form-control','id'=>'role']) !!}
                    @error('role')
                   <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                {!! Form::submit('Cập nhật', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection