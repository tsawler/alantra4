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
        / Products
    @else
        / Products
    @endif
@stop

@section('title')
    Products
@stop

@section('content')

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <p>Intro paragraph on products goes here</p>
        </div>
        <div class="col-md-1"></div>
    </div>

    @if (sizeof($categories) > 0)
        @foreach($categories as $category)
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                        <h3> <a href="/products/{{ $category->slug }}">{{ $category->category_name_fr }}</a></h3>
                        @if (($category->description_fr != null) && (strlen($category->description_fr) > 0))
                            <p>{{ $category->description }}</p>
                        @endif
                    @else
                        <h3> <a href="/products/{{ $category->slug }}">{{ $category->category_name }}</a></h3>
                        @if (($category->description != null) && (strlen($category->description) > 0))
                            <p>{{ $category->description }}</p>
                        @endif
                    @endif
                </div>
                <div class="col-md-2"></div>
            </div>
        @endforeach
    @else

    @endif

@stop