@extends('layouts.share')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm bài viết
        </div>
        @if (session('fail'))
                  <p class="alert alert-primary">{{session('fail')}}</p>
        @endif
        <div class="card-body">
            <form action="{{route('post.validation')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="img">Ảnh đại diện của bài viết</label>
                    <input class="form-control" type="file" name="img" id="img">
                    @error('img')
                            <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">Tiêu đề bài viết</label>
                    <input class="form-control" type="text" name="title" id="title">
                    @error('title')
                            <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="content" class="form-control" id="mytextarea" cols="30" rows="5"></textarea>
                    @error('content')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cat_id">Danh mục</label>
                    <select class="form-control" name="cat_id" id="cat_id">
                      <option>Chọn danh mục</option>
                      @foreach ($cats as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                      @endforeach
                    </select>
                    @error('cat_id')
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
