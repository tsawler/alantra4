@extends('vcms.base')

@section('browser-title')
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        {{ $page_title }}
    @else
        {{ $page_title }}
    @endif
@stop

@section('title')
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

@section('banner')

@stop

@section('content')

    <!-- FORM -->
    <div class="col-md-8">

        <p>Just give us a call or e mail us for help from our knowledgeable staff with everything from a needs analysis,
            project assessment and recommendations and information about everything from manufacturing, installation, and
            delivery.</p>
        <p>You can also <a href="/quote">Request a Quote</a> and we’ll get back to you within two hours. That’s our
            commitment.</p>
        <p>You can also contact one of our head office team for a personalized meeting or to arrange a visit to see our wide
            range of products and services. How to find us.</p>
        <p>Our <a href="/satellite-offices">satellite offices</a> are conveniently located throughout Eastern Canada. Contact information is listed with each
            satellite office.</p>

        <strong>Alantra Head Office and Manufacturing Plant</strong><br>
        <br>
        <i class="fa fa-fw fa-map-marker"></i> 98 Cougle Road Sussex, NB E4E 5L5<br>
        <a href="tel:18004561800>"<i class="fa fa-fw fa-phone"></i></a> Toll Free: 800-456-1800<br>
        <a href="tel:15064333757"><i class="fa fa-fw fa-phone"></i></a> Phone: 506-433-3757<br>
        <i class="fa fa-fw fa-fax"></i> Fax: 506-432-9076<br>
        <a href mailto:'info@alantraleasing.com'><i class="fa fa-fw fa-envelope"></i> info@alantraleasing.com</a>
        <br><br>

        <strong>Alantra&rsquo;s Corporate Headquarters Team</strong><br><br>
        <a href="mailto:marcus@alantraleasing.com">Marcus deWinter</a>, President<br>
        <a href="mailto:alain@alantraleasing.com">Alain (AJ) Leclerc</a>, National Director of Sales<br>
        <a href="mailto:melissa@alantraleasing.com">Melissa Brown</a>, Sales Representative / Marketing<br>
        <a href="mailto:kim@alantraleasing.com">Kim Benson</a>, Sales Representative<br>
        <a href="mailto:mark@alantraleasing.com">Mark Green</a>, Comptroller<br>
        <a href="mailto:mary@alantraleasing.com">Mary Maxwell</a>, Accounts Department<br>
        <a href="mailto:rebecca@alantraleasing.com">Rebecca Kyle</a>, Operations Manager<br>
        <a href="mailto:ryan@alantraleasing.com">Ryan Colpitts</a>, Design &amp; Service<br>
        <a href="mailto:denise@alantraleasing.com">Denise Brown</a>, Design &amp; Quality Assurance<br>
        <a href="mailto:sharon@alantraleasing.com">Sharon Turner</a>, Accounting<br>
        <a href="mailto:stacy@alantraleasing.com">Stacy Mazerolle</a>, Administration<br>
        <a href="mailto:rob@alantraleasing.com">Rob Aiton</a>, Purchasing</p>


        <hr>

        {{ Form::open(array('url' => '/contact', 'role' => 'form', 'name' => 'bookform', 'id' => 'bookform', 'method' => 'post')) }}

        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label>Full Name *</label>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control required" name="contact_name"
                               id="contact_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>E-mail Address *</label>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" value="" maxlength="100" class="form-control required" name="contact_email"
                               id="contact_email">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Subject</label>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-question"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control required" name="contact_subject"
                               id="contact_subject">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Message *</label>
                    <textarea maxlength="5000" rows="10" class="form-control required" name="contact_comment"
                              id="contact_comment"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="submit" value="Send Message" class="btn btn-primary btn-lg" id="contact_submit"/>
            </div>
        </div>
        {{ Form::close() }}

    </div>
    <!-- /FORM -->


    <!-- INFO -->
    <div class="col-md-4">

        <h2>Visit Us</h2>

        <div class="divider half-margins"><!-- divider --></div>

        <p>
            <span class="block"><strong><i class="fa fa-map-marker"></i> Address:</strong> 98 Cougle Road, Sussex NB E4V 5L5</span>
            <span class="block"><strong><i class="fa fa-phone"></i> Toll Free:</strong> <a href="tel:18004561800">800-456-1800</a></span>
            <span class="block"><strong><i class="fa fa-phone"></i> Phone:</strong> <a href="tel:15064333757">506-433-3757</a></span>
            <span class="block"><strong><i class="fa fa-phone"></i> Fax:</strong> <a
                        href="tel:5064329076">506-432-9076</a></span>
            <span class="block"><strong><i class="fa fa-envelope"></i> Email:</strong> <a
                        href="mailto:info@alantraleasing.com">info@alantraleasing</a></span>
        </p>

        <div class="divider half-margins"><!-- divider --></div>

        <h4 class="font300">Business Hours</h4>

        <p>
            <span class="block"><strong>Monday - Friday:</strong> 9am to 5pm</span>
            <span class="block"><strong>Saturday:</strong> Closed</span>
            <span class="block"><strong>Sunday:</strong> Closed</span>
        </p>

    </div>
    <!-- /INFO -->

@stop

@section('bottom-js')
    <script src="/assets/custom/js/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#bookform").validate({
                errorClass: 'text-danger',
                validClass: 'text-success',
                errorElement: 'span',
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