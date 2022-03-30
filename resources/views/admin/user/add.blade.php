@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm người dùng
        </div>
        <div class="card-body">
          {!! Form::open(['url'=>'user/validation','method'=>'POST']) !!}
                <div class="form-group">
                    {!! Form::label('username','Tên đăng nhập', []) !!}
                  {!! Form::text('username','', ['class'=>'form-control','id'=>'username']) !!}
                    @error('username')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    {!! Form::label('fullname','Họ và tên', []) !!}
                  {!! Form::text('fullname','', ['class'=>'form-control','id'=>'fullname']) !!}
                    @error('fullname')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div> --}}
                <div class="form-group">
                    {!! Form::label('email', 'Email', []) !!}
                    {!! Form::email('email', '', ['class'=>'form-control','id'=>'email']) !!}
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
                    <select name="role" id="role"class="form-control">
                        @foreach ($roles as $role)
                              <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                      
                    </select>
                    @error('role')
                   <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                {!! Form::submit('Thêm mới', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection