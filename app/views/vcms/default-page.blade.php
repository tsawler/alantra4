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
        @if (sizeof($images) == 1)
            <div class="row">
                <div class="col-md-12">
                    <img src="/page_images/{{ $images[0]->file_name }}">
                </div>
            </div>
        @endif
    @endif

    @include('vcms::partials.edit-region')
@stop
