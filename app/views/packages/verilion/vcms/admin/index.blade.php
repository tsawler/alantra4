@extends('vcms::base')

@section('top-white')
<div class="col-sm-6">
    <h2>Dashboard</h2>
</div>
@stop

@section('css')
    <style>
        .vertical-center {
            min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }
    </style>

@section('content-title')

@stop

@section('content')

    <div class="text-center vertical-center">

        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <span class="pull-right">
                        <i class="fa fa-envelope fa-4x fa-fw"></i><br>
                        <a href="/admin/contacts/list-all-website-contacts" class="btn btn-primary" type="button">
                            Contacts <span class="badge">{{ $contacts or '' }}</span>
                        </a>
                    </span>
                </div>
                <div class="col-md-6 text-center">
                    <span class="pull-left"><i class="fa fa-dollar fa-4x fa-fw"></i><br>
                        <a href="/admin/quotes/all-quotes" class="btn btn-primary" type="button">
                            Quote Requests <span class="badge">{{ $quotes or '' }}</span>
                        </a>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

        </div>

    </div>


@stop

@section('bottom-js')

@stop