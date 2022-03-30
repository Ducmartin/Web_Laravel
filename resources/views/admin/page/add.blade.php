@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm trang
        </div>
        <div class="card-body">
            {!! Form::open(['url'=>'page/validation','method'=>'POST']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Tiêu đề trang', []) !!}
                   {!! Form::text('title',' ', ['class'=>'form-control','id'=>'name']) !!}
                    @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Trạng thái', []) !!}
                    <div class="form-check">
                        {!! Form::radio('status','1','', ['class'=>'form-check-input','id'=>'exampleRadios1']) !!}
                        {!! Form::label('exampleRadios1','Chờ duyệt', ['class'=>'form-check-label']) !!}
                    </div>
                    <div class="form-check">
                            {!! Form::radio('status','2','', ['class'=>'form-check-input','id'=>'exampleRadios2']) !!}
                          {!! Form::label('exampleRadios2','Công khai', ['class'=>'form-check-label']) !!}
                    </div>
                    @error('status')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                {!! Form::submit('Thêm mới', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>  
@endsection
