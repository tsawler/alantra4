@extends('vcms.base')

@section('browser-title')
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        Testimonials
    @else
        Testimonials
    @endif
@stop

@section('breadcrumb')
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        / Testimonials
    @else
        / Testimonials
    @endif
@stop

@section('title')
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        Testimonials
    @else
        Testimonials
    @endif
@stop

@section('content')

    @foreach($testimonials as $t)

    @endforeach

@stop

