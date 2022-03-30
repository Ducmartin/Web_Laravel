@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        @if(session('delete'))
        <div class="alert alert-success">
            {{session('delete')}}
        </div>
        @endif
        @if(session('edit'))
        <div class="alert alert-success">
            {{session('edit')}}
        </div>
        @endif
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="{{route('product.search')}}" method="GET">
                    <input type="text" name="search" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{route('product.stocking')}}" class="text-primary">Còn hàng<span class="text-muted">({{$yes}})</span></a>
                <a href="{{route('product.out_of_stocking')}}" class="text-primary">Hết hàng<span class="text-muted">({{$no}})</span></a>
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            @if (count($products)>0)
             <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                     $t=0;   
                    @endphp
                    @foreach ($products as $product)
                     @php
                        $t++; 
                        foreach ($thumbnails as $thumbnail) {
                            if($thumbnail->product_id==$product->id){
                                $image=$thumbnail->thumbnail;
                                break;
                            }
                        }
                     @endphp
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>{{$t}}</td>           
                        <td><img height="80px" width="120px" src="{{url($image) }}" alt=""></td>
                        <td><a href="#"></a>{{$product->name}}</td>
                        <td>{{number_format($product->price,0,'.','.')}}đ</td>
                        <td>{{$product->cat->name}}</td>
                        <td>{{$product->created_at}}</td>
                        @if ($product->status->name=='còn hàng')
                        <td><span class="badge badge-success">{{$product->status->name}}</span></td>
                        @else
                              <td><span class="badge badge-warning">{{$product->status->name}}</span></td>
                        @endif
                      
                        <td>
                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
             </table>
            @else
              <p class="text-center">Không có sản phẩm nào trong danh sách sản phẩm</p>
            @endif
            {{$products->links()}}
        </div>
    </div>
</div>
@endsection