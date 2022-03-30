@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Danh sách slider
        </div>
        <div class="card-body">
          @foreach ($sliders as $slider)
          <div style="width:25%;height:150px;position:relative;margin:2%;display:inline-block">
            <a href="{{route('slider.delete',$slider->id)}}" style="position: absolute;top:5px;right:5px;color:red" title="Xóa"><i class="fas fa-trash-alt"></i></a>
            <img style="width:100%;height:100%" src="{{url($slider->img)}}" alt="">
          </div>
          @endforeach
        </div>
    </div>
</div>  
@endsection
