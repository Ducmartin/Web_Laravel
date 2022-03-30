@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        @if (session('edit'))
            <div class="alert alert-success">
                {{session('edit')}}
            </div>
        @endif
        <div class="card-header font-weight-bold">
            Thêm bài viết
        </div>
        <div class="card-body">
            <form action="{{route('post.validation_edit',$id)}}" method="POST">
                @csrf
                @csrf
                <div class="form-group">
                    <label for="title">Tiêu đề bài viết</label>
                    <input class="form-control" type="text" value="{{$post->title}}" name="title" id="title">
                    @error('title')
                            <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="content" class="form-control" id="mytextarea" cols="30" rows="5">{{$post->content}}</textarea>
                    @error('content')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cat_id">Danh mục</label>
                    <select class="form-control" name="cat_id" id="cat_id">
                      <option>Chọn danh mục</option>
                      <option value="1" {{$check=$post->cat_id==1?'selected':''}} >Giới thiệu</option>
                      <option value="2" {{$check=$post->cat_id==2?'selected':''}}>Liên hệ</option>
                    </select>
                    @error('cat_id')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" {{$check=$post->status_id==1?'checked':''}} name="status_id" id="exampleRadios1" value="1" >
                        <label class="form-check-label" for="exampleRadios1">
                          Chờ duyệt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input"  {{$check=$post->status_id==2?'checked':''}} type="radio" name="status_id" id="exampleRadios2" value="2">
                        <label class="form-check-label" for="exampleRadios2">
                          Công khai
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
<script src="https://cdn.tiny.cloud/1/1bx6anwf2afa3ba4k21eu3zx5ilnkmkywiy603xdqs11rb3d/tinymce/4/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    var editor_config = {
         path_absolute : "http://localhost/Project_laravel_admin/",
         selector: "#mytextarea",
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
</div>  
@endsection
