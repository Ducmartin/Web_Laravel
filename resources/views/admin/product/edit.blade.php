@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm sản phẩm
        </div>
        <div class="card-body">
            <form action="{{route('product.validation_edit',$id)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @csrf
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" value="{{$product->name}}" name="name" id="name">
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input class="form-control" type="number" value="{{$product->price}}" name="price" id="name">
                            @error('price')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
             
                        <div class="form-group">
                            <label for="desc">Mô tả sản phẩm</label>
                            <textarea name="desc" class="form-control" id="desc" cols="30" rows="5">{{$product->desc}}</textarea>
                            @error('desc')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                <div class="form-group">
                    <label for="mytextarea">Chi tiết sản phẩm</label>
                    <textarea name="detail" class="form-control" id="mytextarea" cols="30" rows="10">{{$product->detail}}</textarea>
                    @error('detail')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div> 
                <div class="form-group">
                <label for="image"> <strong>Ảnh sản phẩm</strong> </label> 
               </div>
                        @foreach ($thumbnails as $thumbnail)
                               <img   src="{{url($thumbnail->thumbnail)}}" alt="">
                        @endforeach
                <div class="form-group">
                    <label for="image"><strong>Thêm ảnh sản phẩm</strong></label>
                  <input type="file" class="form-control-file" name="images[]" id="image" multiple="multiple">
                  @error('images')
                  <small class="form-text text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="cat_id">Danh mục</label>
                    <select class="form-control" name="cat_id"  id="cat_id">
                        <option value="0">Chọn danh mục</option>
                        @foreach ($product_cats as $item)
                        <option value="{{$item->id}}"{{$checked=$product->cat->id==$item->id?'selected':''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('cat_id')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_id">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" {{$checked=$product->status_id==3?'checked':''}} type="radio" name="status_id" id="status_id_1" value="3">
                        <label class="form-check-label" for="status_id_1">
                            Còn hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" {{$checked=$product->status_id==4?'checked':''}} name="status_id" id="status_id_2" value="4">
                        <label class="form-check-label" for="status_id_2">
                            Hết hàng
                        </label>
                    </div>
                    @error('status_id')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/1bx6anwf2afa3ba4k21eu3zx5ilnkmkywiy603xdqs11rb3d/tinymce/4/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    var editor_config = {
         path_absolute : "http://localhost/Project_laravel_admin/",
         selector: "textarea",
         plugins: [
         "advlist autolink lists link image charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars code fullscreen",
         "insertdatetime media nonbreaking save table contextmenu directionality",
         "emoticons template paste textcolor colorpicker textpattern"
         ],
         toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
         relative_urls: false,
         file_browser_callback : function(field_name, url, type, win) {
         var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
         var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

         var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
         if (type == 'image') {
             cmsURL = cmsURL + "&type=Images";
         } else {
             cmsURL = cmsURL + "&type=Files";
         }

         tinyMCE.activeEditor.windowManager.open({
             file : cmsURL,
             title : 'Filemanager',
             width : x * 0.8,
             height : y * 0.8,
             resizable : "yes",
             close_previous : "no"
         });
         }
     };

     tinymce.init(editor_config);
   </script>

@endsection