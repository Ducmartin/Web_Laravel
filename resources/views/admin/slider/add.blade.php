@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm slider
        </div>
        <div class="card-body">
          <form action="{{route("validation_slider")}}" method="POST" enctype="multipart/form-data">
            @csrf
             <input type="file" name="slider" id="slider" class="form-control">
             @error('slider')
             <small class="form-text text-danger">{{$message}}</small>
             @enderror
             @if (session('fail'))
             <small class="form-text text-danger">{{session('fail')}}</small>
             @endif
             <button style="margin-top:10px" type="submit" class="btn btn-primary">Thêm mới</button>
          </form>
        </div>
    </div>
</div>  
@endsection
