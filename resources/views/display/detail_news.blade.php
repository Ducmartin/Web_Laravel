@extends('layouts.display')
@section('content')
    <div id="main-content-wp" class="home-page clearfix">
        <div class="wp-inner">
            <div class="main-content fl-right">
                <div class="section-head clearfix">
                    <h3 class="section-title" style="display: block;
                    font-size: 24px;
                    font-weight: normal;
                    line-height: normal;
                    font-family: 'Roboto Regular';
                    padding-bottom: 10px;">{{$post->title}}</h3>
                </div>
                <div class="section-detail">
                    <span class="create-date" style="    position: relative;
                    display: block;
                    font-size: 13px;
                    color: #989898;
                    padding-left: 20
                px
                ;
                    padding-bottom: 10
                px
                ;">{{$post->created_at}}</span>
                    <div class="detail">
                    {!!$post->content!!}
                 </div>
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
