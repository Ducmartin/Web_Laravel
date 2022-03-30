@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh mục sản phẩm
                </div>
                <div class="card-body">
                    <form action="{{route('product.validation_addcat')}}" method="POST">
                        @csrf
                        @csrf
                        <div class="form-group">
                            <label for="name">Nhãn hiệu</label>
                            <input class="form-control" type="text" name="name" id="name">
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cat_parent">Danh mục</label>
                            <select class="form-control" name="cat_parent" id="cat_parent">
                                <option>Chọn danh mục</option>
                                @php
                                 $k=0   
                                @endphp
                                @foreach ($parent_cat as $parent)
                                @php
                                 $k++  
                                @endphp
                                @if ($parent->slug==Str::slug($parent->name))
                                <option value="{{$parent->id}}">{{$parent->name}}</option>  
                                @endif
                               
                                @endforeach
                            </select>
                            @error('cat_parent')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_id" id="exampleRadios1" value="1" >
                                <label class="form-check-label" for="exampleRadios1">
                                    Chờ duyệt
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_id" id="exampleRadios2" value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                    Công khai
                                </label>
                            </div>
                            @error('status_id')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
       
        <div class="col-8"> 
            @if (session('success'))
            <div class="alert alert-success">
            {{session('success')}}
            </div>  
             @endif
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh sách
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Danh mục </th>
                                <th scope="col">Nhãn hiệu</th>
                                <th scope="col">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                           $t=0;    
                           @endphp
                           @foreach ($product_cats as $product_cat)
                           @if ($product_cat->slug!=Str::slug($product_cat->name))
                           @php
                           $t++;    
                           @endphp
                               <tr>
                                <th scope="row">{{$t}}</th>
                               @foreach ($product_cats as $cat)
                                    @if (Str::startsWith( $product_cat->slug,$cat->slug)==true)
                                   <td>{{$cat->name}}</td> 
                                    @endif
                                @endforeach
                                <td>{{$product_cat->name}}</td>
                                <td>{{$product_cat->status->name}}</td>
                            </tr>
                           @endif
                           
                           @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection