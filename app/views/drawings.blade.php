@extends('vcms.base')

@section('browser-title')
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        {{ $product->title_fr }}
    @else
        {{ $product->title }}
    @endif
@stop

@section('breadcrumb')
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        / Nos produits
        / {{ $product->title_fr }}
    @else
        / Products
        / {{ $product->title }}
        @endif
        @stop

        @section('title')
            @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                <h3>{{ $product->title_fr }} : {{ Lang::get('products.drawings') }}</h3>
            @else
                <h3>{{ $product->title }}: {{ Lang::get('products.drawings') }}</h3>
                @endif
                        <br>
        @stop

        @section('content')
                <!-- CONTENT -->

        <div class="row">
            <div class="col-sm-12">

                <br>
                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                    <h3>{{ $product->title_fr }} : {{ Lang::get('products.drawings') }}</h3>
                @else
                    <h3>{{ $product->title }}: {{ Lang::get('products.drawings') }}</h3>
                @endif

                <ul> 
                    @foreach($drawings as $drawing) 
                        <li>  <a href="/product_drawings/{{ $drawing->drawing_file }}">  {{ $drawing->drawing_title }}  </a> </li> 
                    @endforeach
                </ul>


                <a href="/quote"
                   class="btn btn-primary btn-lg btn-margin-top">
                    <i class="fa fa-external-link"></i> Request a Quote
                </a>


            </div>

        </div>


        <!-- /CONTENT -->
@stop