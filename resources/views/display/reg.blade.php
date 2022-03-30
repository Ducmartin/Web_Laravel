
@extends('layouts.display')
@section('content')
<div class="container">
    <div id="reg">
        <div class="form-reg">
            <div class="title">
                <h1 class="light">Đăng Ký</h1>
            </div>
            <div class="line">
            </div>
         <form action="{{Route('validation_user_reg')}}" method="POST">
            @csrf
            @csrf
            <div class="">
                <label for="username" class="light">Tên đăng nhập</label>
                <input type="text" name="username" class="form-controller btn-light" id="username" placeholder="Tên đăng nhập" >
              @error('username')
                <small style="text-align: center; margin-left: 30px;">{{$message}}</small>  
              @enderror
            </div> 
            <div class="" >
                <label for="password"class="light">Mật khẩu</label>
                <input type="password" name="password" class="form-controller" id="password" placeholder="Mật khẩu">
                @error('password')
                <small style="text-align: center; margin-left: 30px;">{{$message}}</small>  
              @enderror
            </div>
            <div class="form-group" >
                <label for="email"class="light">Email</label>
                <input type="email" name="email" class="form-controller" id="email" placeholder="Email">
                @error('email')
                <small style="text-align: center; margin-left: 30px;">{{$message}}</small>  
              @enderror
            </div>
            <div class="form-group" >
                <label for="phone_number"class="light">Số điện thoại</label>
                <input type="phone_number" name="phone_number" class="form-controller" id="phone_number" placeholder="Số điện thoại">
                @error('phone_number')
                <small style="text-align: center; margin-left: 30px;">{{$message}}</small>  
              @enderror
            </div>
            <div class="form-group">
                <input type="submit" id="submit" class="btn-danger light" value="Đăng ký">
                <small ><a href="{{url('dang-nhap')}}">Đăng nhập?</a></small>
            </div>
         </form>
        </div>
        
    </div>   
</div>
@endsection
