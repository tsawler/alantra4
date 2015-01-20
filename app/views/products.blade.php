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

    <table class="table table-compact-table-striped">
        <thead>
            <tr>
                <th>Item</th>
                <th>Product Category</th>
            </tr>
        </thead>
        <tbody>
            @if (sizeof($products) > 0)

            @else
                <tr>
                    <td colspan="2">No active Products</td>
                </tr>
            @endif
        </tbody>
    </table>
@stop