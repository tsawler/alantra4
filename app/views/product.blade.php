@extends('vcms.base')

@section('browser-title')
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        {{ $product->title }}
    @else
        {{ $product->title_fr }}
    @endif
@stop

@section('breadcrumb')
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        / {{ $product->category->category_name_fr }}
        / {{ $product->title_fr }}
    @else
        / {{ $product->category->category_name_fr }}
        / {{ $product->title }}
    @endif
@stop

@section('title')
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        {{ $product->title }}
    @else
        {{ $product->title_fr }}
    @endif
@stop