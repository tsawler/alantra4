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
            <p>Sed tincidunt, diam sit amet mattis finibus, nunc nibh accumsan eros, vitae consectetur nunc quam a dolor. Nulla et iaculis libero. Aliquam erat volutpat. Curabitur maximus, elit nec malesuada ullamcorper, mi turpis pellentesque dolor, non posuere ipsum turpis eget felis. Curabitur vestibulum leo ipsum, in dignissim leo imperdiet non. Nunc imperdiet volutpat auctor. Nulla faucibus arcu id massa elementum auctor. Nam in sapien sapien. Vestibulum vel egestas diam, ac consequat dui.</p>
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