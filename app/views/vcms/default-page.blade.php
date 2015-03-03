@extends('vcms.base')

@section('browser-title')
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        {{ $page_title }}
    @else
        {{ $page_title }}
    @endif
@stop

@section('breadcrumb')
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        / {{ $page_title }}
    @else
        / {{ $page_title }}
    @endif
@stop

@section('title')
    @include('vcms::partials.edit-title')
@stop

@section('banner')
    @if (sizeof($images) > 0)
        @if (sizeof($images) == 1)
            <div class="slider fullwidthbanner-container roundedcorners">
                <div class="fullwidthbanner">
                    <img src="/page_images/{{ $images[0]->image_name }}">
                </div>
            </div>
        @else
            <div class="fullwidthbanner-container roundedcorners">
                <div class="owl-carousel controlls-over fullwidthbanner"
                     data-plugin-options='{
                                "items": {{ sizeof($images) }},
                                "singleItem": true,
                                "navigation": true,
                                "autoPlay": true,
                                "pagination": false,
                                "transitionStyle":"scaleUp"}'>
                    @foreach($images as $image)
                        <div>
                            <img alt="" class="img-responsive" src="/page_images/{{ $image->image_name }}">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endif
@stop

@section('content')
    @include('vcms::partials.edit-region')
@stop
