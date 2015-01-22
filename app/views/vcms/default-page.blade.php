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

@section('content')
    @if (sizeof($images) > 0)
        Has image;
    @endif
    @include('vcms::partials.edit-region')
@stop
