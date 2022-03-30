@extends('layouts.display')
@section('content')
    <div class="container">
        <div id="login">
            <div class="form-login">
                @if (session('success'))
                    <p style="text-align: center;color: green;font-size: 15px;">{{ session('success') }}</p>
                @endif
                @if (session('login'))
                    <p style="text-align: center;color: green;font-size: 15px;">{{ session('login') }}</p>
                @endif
                <div class="title">
                    <h1 class="light">Đăng Nhập</h1>
                </div>
                <div class="line">
                </div>
                <form action="{{Route('validation_login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username" class="light">Tên đăng nhập</label>
                        <input type="text" name="username" class="form-controller btn-light" id="username"placeholder="Tên đăng nhập">
                        @error('username')
                            <small style="margin-left: 30%;">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="light">Mật khẩu</label>
                        <input type="password" name="password" class="form-controller" id="password" placeholder="Mật khẩu">
                        @error('password')
                        <small style="margin-left: 30%;">{{$message}}</small>
                         @enderror
                    </div>
                    <input type="hidden" name="url" value="{{url()->previous()}}">
                    <div class="form-group">
                        <input type="submit" id="submit" class="btn-danger light" value="Đăng nhập">
                        @if (session('fail'))
                        <p style="text-align: center;color: green;font-size: 15px;">{{session('fail')}}</p>
                        @endif
                        <small><a href="{{ url('dang-ky') }}">Đăng ký</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
