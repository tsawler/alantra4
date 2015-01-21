@extends('vcms.base')

@section('browser-title')
    {{ $category_name }}
@stop

@section('breadcrumb')
        / Products
        / {{ $category_name }}
@stop

@section('title')
    {{ $category_name }}
@stop

@section('content')

    @foreach($products as $product)
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            $item = Product::find($product->id);
            ?>
            <div class="row">
                <div class="col-md-2">
                    <?php
                        $images = $item->images;
                        if (sizeof($images) > 0){
                            ?>
                            <a href="/products/product/{{ $item->slug }}">
                                <img class='img img-responsive img-thumbnail' src="/product_images/thumbs/{{ $images[0]->image_name }}">
                            </a>
                            <?php
                        } else {
                            ?>
                            <a href="/products/product/{{ $item->slug }}">
                                <img class='img img-responsive img-thumbnail' src="http://placehold.it/350x350&text=No+Image">
                            </a>
                            <?php
                        }
                    ?>
                </div>
                <div class="col-md-10">
                    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                        <h4><a href="/products/product/{{ $item->slug }}">{{ $item->title_fr }}</a></h4>
                        {{ $item->description_fr }}
                    @else
                        <h4><a href="/products/product/{{ $item->slug }}">{{ $item->title }}</a></h4>
                        {{ $item->description }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
        </div>
    @endforeach
@stop