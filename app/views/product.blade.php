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
        <h3>{{ $product->title_fr }}</h3>
    @else
        <h3>{{ $product->title }}</h3>
    @endif
@stop

@section('content')
    <!-- CONTENT -->

    <div class="row">
        <div class="col-sm-6 col-md-7">
            <div class="owl-carousel controlls-over product-image"
                 data-plugin-options='{
                    "items": 1,
                    "singleItem": true,
                    "navigation": true,
                    "pagination": false,
                    "autoPlay": true,
                    "transitionStyle":"fadeUp"}'>
                @foreach($product->images as $image)
                <div>
                    <img alt="" class="img-responsive" src="/product_images/{{ $image->image_name }}">
                </div>
                @endforeach
            </div>

            @if(sizeof($drawings) > 0)
                <h3>Drawings</h3>
                <ul>
                    @foreach($drawings as $drawing)
                        <li>
                            <a href="/product_drawings/{{ $drawing->drawing_file }}">
                                {{ $drawing->drawing_title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>

        <div class="col-sm-6 col-md-5">
            @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                <h3>{{ $product->title_fr }}</h3>
            @else
                <h3>{{ $product->title }}</h3>
            @endif

            @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                    <p>{{ $product->description_fr }}</p>
            @else
                    <p>{{ $product->description }}</p>
            @endif

                <h4>Features</h4>
                <ul class="list-icon star-o">
                    @if ($product->electric_heat == 1)
                        <li>Electric Heat</li>
                    @endif

                    @if ($product->communications_panel == 1)
                        <li>Communications Panel</li>
                    @endif

                    @if ($product->ac == 1)
                        <li>Air Conditioning</li>
                    @endif

                    @if ($product->electric_mast == 1)
                        <li>Electric Mast</li>
                    @endif

                    @if ($product->drawing_tables == 1)
                        <li>Drawing Tables</li>
                    @endif

                    @if ($product->emergency_lights == 1)
                        <li>Emergency/Exit Lights</li>
                    @endif

                    @if ($product->coat_hooks == 1)
                        <li>Coat Hooks</li>
                    @endif

                    @if ($product->bulletin_boards == 1)
                        <li>Bulletin Boards</li>
                    @endif

                    @if ($product->water_septic == 1)
                        <li>Water and Septic Tanks</li>
                    @endif

                    @if ($product->exhaust_fans == 1)
                        <li>Exhaust Fans</li>
                    @endif

                    @if ($product->hot_water_heaters == 1)
                        <li>Hot Water Heaters</li>
                    @endif

                    @if ($product->laundry_sink == 1)
                        <li>Laundry Sink</li>
                    @endif

                    @if ($product->hand_dryers == 1)
                        <li>Hand Dryers</li>
                    @endif

                    @if ($product->toilets == 1)
                        <li>Toilets</li>
                    @endif

                    @if ($product->urinals == 1)
                        <li>Urinals</li>
                    @endif

                    @if ($product->sinks == 1)
                        <li>Sinks</li>
                    @endif
                </ul>

                @if (($product->id != 4) && ($product->id != 6) && ($product->id != 9)
                    && ($product->id != 11) && ($product->id != 12) && ($product->id != 13))

                    <h4>Optional Features</h4>
                    <ul class="list-icon star-o">

                        @if ($product->office_desks == 1)
                            <li>Office Desks (5' Wood with Drawers)</li>
                        @endif

                        @if ($product->office_chairs == 1)
                            <li>Office Chairs (Leather Manager)</li>
                        @endif

                        @if ($product->folding_chairs == 1)
                            <li>Folding Chairs</li>
                        @endif

                        @if ($product->folding_tables == 1)
                            <li>6' Folding Tables</li>
                        @endif

                        @if ($product->filing_cabinets == 1)
                            <li>Filing Cabinets</li>
                        @endif

                        @if ($product->lockers == 1)
                            <li>Lockers</li>
                        @endif

                        @if ($product->fridges == 1)
                            <li>Fridges</li>
                        @endif

                        @if ($product->microwaves == 1)
                            <li>Microwaves</li>
                        @endif

                        @if ($product->insurance == 1)
                            <li>Fire &amp; Theft Insurance ($25.00/month)</li>
                        @endif
                    </ul>
                @endif

                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                    <a href="/quote?i={{ urlencode($product->title_fr) }}"
                        class="btn btn-primary btn-lg btn-margin-top">
                        <i class="fa fa-external-link"></i> Request a Quote
                    </a>
                @else
                    <a href="/quote?i={{ urlencode($product->title) }}"
                       class="btn btn-primary btn-lg btn-margin-top">
                        <i class="fa fa-external-link"></i> Request a Quote
                    </a>
                @endif

        </div>
    </div>


    <!-- /CONTENT -->
@stop