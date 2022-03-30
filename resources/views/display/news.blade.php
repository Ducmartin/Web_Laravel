@extends('layouts.display')
@section('content')
    <div id="main-content-wp" class="home-page clearfix">
        <div class="wp-inner">
            <div class="main-content fl-right">
                <div class="section-detail">
                    <ul class="list-item" >
                        @foreach ($posts as $post)
                             <li class="clearfix" style="position: relative;">
                            <a style="width:30%;height:200px" href="{{route('detail_news',[Str::slug($post->title),$post->id])}}" title="" class="thumb fl-left">
                                <img style="width:100%;height:100%" src="{{url($post->img)}}" alt="">
                            </a>
                            <div class="info fl-right" style="position: absolute; left:32%;display: inline-grid">
                                <a style="font-size: 21px; line-height: 30px;font-family: 'Roboto Regular';color: #1f1f1f;padding-bottom: 1px;" href="{{route('detail_news',[Str::slug($post->title),$post->id])}}" title="{{$post->title}}" class="title">{{$post->title}}</a>
                               <span style="font-size: 13px;color: #989898; padding-left: 0px ;padding-bottom: 5 px;" class="create-date"> Cập nhật {{$post->created_at}}</span>
                              {!!Str::limit(Str::after($post->content, '<h2>'),520, '[...]')!!}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        {{$posts->links()}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            @include('layouts.sidebar')
            @include('layouts.sale')
        </div>
    </div>

    </div>

@endsection
