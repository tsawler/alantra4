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
    Request a Quote
@stop

@section('content')

    <!-- FORM -->
    <div class="col-md-2"></div>

    <div class="col-md-8">

        {{ Form::open(array('url' => '/quote', 'role' => 'form', 'name' => 'bookform', 'id' => 'bookform', 'method' => 'post')) }}

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Company *</label>
                    <input type="text" value="" maxlength="100" class="form-control required" name="company" id="company">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label>Full Name *</label>
                    <input type="text" value="" maxlength="100" class="form-control required" name="contact_name" id="contact_name">
                </div>
                <div class="col-md-6">
                    <label>E-mail Address *</label>
                    <input type="email" value="" data-msg-email="Please enter a valid email address." maxlength="100" class="form-control required" name="contact_email" id="contact_email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Phone</label>
                    <input type="text" value="" maxlength="100" class="form-control required" name="phone" id="phone">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Address</label>
                    <input type="text" value="" maxlength="100" class="form-control required" name="address" id="address">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>City</label>
                    <input type="text" value="" maxlength="100" class="form-control required" name="city" id="city">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Province</label>
                    <select name="province">
                        <option value="AB">Alberta</option>
                        <option value="BC">British Columbia</option>
                        <option value="MB">Manitoba</option>
                        <option value="NB">New Brunswick</option>
                        <option value="NL">Newfoundland &amp; Labrador</option>
                        <option value="NS">Nova Scotia</option>
                        <option value="ON">Ontario</option>
                        <option value="PE">Prince Edward Island</option>
                        <option value="QC">Quebec</option>
                        <option value="SK">Saskatchewan</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Date Needed</label>
                    <input type="text" value="" maxlength="100" class="form-control required" name="date" id="date">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Message *</label>
                    <textarea  maxlength="5000" rows="10" class="form-control required" name="contact_comment" id="contact_comment"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="submit" value="Request Quote" class="btn btn-primary btn-lg" id="contact_submit" />
            </div>
        </div>
        {{ Form::close() }}

    </div>

    <div class="col-md-2"></div>
    <!-- /FORM -->
@stop

@section('bottom-js')
    <script src="/assets/custom/js/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#date").datepicker({format: 'yyyy-mm-dd', startView: 2, autoclose: true, startDate: new Date()});
            $("#bookform").validate({
                errorClass:'text-danger',
                validClass:'text-success',
                errorElement:'span',
                highlight: function (element, errorClass, validClass) {
                    $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".text-danger").removeClass(errorClass).addClass(validClass);
                }
            });
        });
    </script>
@stop