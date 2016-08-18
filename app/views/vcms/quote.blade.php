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
    @if(strlen($interested_in) > 0)
        : {{ $interested_in }}
    @endif
@stop

@section('banner')
    <div class="fullwidthbanner-container">
        <div class="owl-carousel controlls-over"
             data-plugin-options='{
                                "items": 1,
                                "singleItem": true,
                                "navigation": true,
                                "autoPlay": true,
                                "pagination": false}'>
                <div>
                    <img alt="" class="img-responsive" src="/page_images/writing.jpg">
                </div>
        </div>
    </div>
@stop

@section('content')

    <!-- FORM -->
    <div class="col-md-2"></div>

    <div class="col-md-8">

        <p>If you know your specifications, just fill out the form below and we will be in touch promptly with any questions and/or your quote. Or you can call or e mail us for assistance in helping determine the best solutions for your needs.</p>

        <p>
        <a href="tel:18004561800>"<i class="fa  fa-fw fa-fw fa-phone"></i></a> Toll Free: 800-456-1800<br>
        <a href="tel:15064333757"><i class="fa  fa-fw fa-fw fa-phone"></i></a> Phone: 506-433-3757<br>
        <i class="fa  fa-fw fa-fw fa-fax"></i> Fax: 506-432-9076<br>
        <a href mailto:'info@alantraleasing.com'><i class="fa  fa-fw fa-fw fa-envelope"></i> info@alantraleasing.com</a>
        </p>


        {{ Form::open(array('url' => '/quote', 'role' => 'form', 'name' => 'bookform', 'id' => 'bookform', 'method' => 'post')) }}

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Company *</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-fw fa-building"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control required" name="company" id="company">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label>Full Name *</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-fw fa-user"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control required" name="full_name" id="full_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>E-mail Address *</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-fw fa-envelope"></i></span>
                        <input type="email" value="" maxlength="100" class="form-control required" name="email" id="email">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Phone</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-fw fa-phone"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control" name="phone" id="phone">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Address</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-fw fa-map-marker"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control" name="address" id="address">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>City</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-fw fa-info"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control" name="city" id="city">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Province</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-fw fa-globe"></i></span>
                    <select name="province" class="form-control">
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
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Date Needed</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-fw fa-calendar"></i></span>
                            <input type="text" value="" maxlength="100" class="form-control" name="date_needed" id="date">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Products</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-fw fa-gear"></i></span>
                        <input type="text" value="{{ $interested_in }}" maxlength="100" class="form-control" name="interested_in">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Delivery Location?</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-fw fa-map-marker"></i></span>
                        <input type="text"  maxlength="100" class="form-control required" name="delivery_location">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>How did you hear about us?</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa  fa-fw fa-globe"></i></span>
                        <select name="how_heard" class="form-control required" id="how_heard">
                            <option value="">Please choose...</option>
                            <option value="Word of mouth">Word of mouth</option>
                            <option value="Used products before">Used products before</option>
                            <option value="Digital advertisement">Digital Advertisement</option>
                            <option value="Print advertisement">Print advertisement</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Yellow Pages">Yellow Pages</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div id="otherdiv" class="hidden">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Please Specify</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-fw fa-font"></i></span>
                            <input type="text"  maxlength="100" class="form-control required" name="other_details">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Message *</label>
                    <textarea  maxlength="5000" rows="10" class="form-control required" name="message" id="contact_comment"></textarea>
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

        $("#how_heard").change(function(){
           if ($("#how_heard").val() == 'Other') {
               $("#otherdiv").removeClass('hidden');
           } else {
               $("#otherdiv").addClass('hidden');
           }
        });
    </script>
@stop