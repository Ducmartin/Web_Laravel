@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm trang
        </div>
        <div class="card-body">
            {!! Form::open(['route'=>['page.validation_edit',$page->id],'method'=>'POST ']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Tiêu đề trang', []) !!}
                   {!! Form::text('title',$page->title, ['class'=>'form-control','id'=>'name']) !!}
                    @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Trạng thái', []) !!}
                    <div class="form-check">
                        @php
                           $check_1='';
                           $check_2='';
                            if($page->status_id==1) $check_1=true;
                             else {
                                $check_2=true;
                             }
                        @endphp
                        
                        {!! Form::radio('status','1',$check_1, ['class'=>'form-check-input','id'=>'exampleRadios1']) !!}
                        {!! Form::label('exampleRadios1','Chờ duyệt', ['class'=>'form-check-label']) !!}
                    </div>
                    <div class="form-check">
                            {!! Form::radio('status','2',$check_2, ['class'=>'form-check-input','id'=>'exampleRadios2']) !!}
                          {!! Form::label('exampleRadios2','Công khai', ['class'=>'form-check-label']) !!}
                    </div>
                    @error('status')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                {!! Form::submit('Cập nhật', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>  
@endsection
