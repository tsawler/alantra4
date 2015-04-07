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

        <p>Just give us a call or email us for help from our knowledgeable staff with everything from a needs analysis,
            project assessment and recommendations and information about everything from manufacturing, installation, and
            delivery.</p>
        <p>You can also <a href="/quote">Request a Quote</a> and we’ll get back to you within two hours. That’s our
            commitment.</p>

        <p><a class="btn btn-primary" href="/quote">Request a Quote</a></p>

        <p>You can also contact one of our head office team for a personalized meeting or to arrange a visit to see our wide
            range of products and services. <a href="https://www.google.ca/maps/place/98+Cougle+Rd,+Sussex+Corner,+NB+E4E+2S6/@45.7246302,-65.4709224,15z/data=!4m2!3m1!1s0x4ca722cec36ef9bb:0xc52dd29c7a4db238" target="_blank">How to find us</a>.</p>
        <p>Our <a href="/distribution-centres">distribution centres</a> are conveniently located throughout Eastern Canada. Contact information is listed with each
            distribution centre.</p>

        <strong>Alantra Head Office and Manufacturing Plant</strong><br>
        <br>
        <i class="fa fa-fw fa-map-marker"></i> 98 Cougle Road Sussex, NB E4E 5L5<br>
        <a href="tel:18004561800>"<i class="fa fa-fw fa-phone"></i></a> Toll Free: 800-456-1800<br>
        <a href="tel:15064333757"><i class="fa fa-fw fa-phone"></i></a> Phone: 506-433-3757<br>
        <i class="fa fa-fw fa-fax"></i> Fax: 506-432-9076<br>
        <a href mailto:'info@alantraleasing.com'><i class="fa fa-fw fa-envelope"></i> info@alantraleasing.com</a>
        <br><br>

        <strong>Alantra&rsquo;s Corporate Headquarters Team</strong><br><br>
        <strong>Marcus deWinter</strong>, President &amp; General Manager<br>
        <strong>Melissa Brown</strong>, Sales Representative / Marketing<br>
        <strong>Kim Benson</strong>, Sales Representative<br>
        <strong>Mark Green</strong>, Comptroller<br>
        <strong>Mary Maxwell</strong>, Accounts Department<br>
        <strong>Rebecca Richardson</strong>, Operations Manager, Service<br>
        <strong>Ryan Colpitts</strong>, Design<br>
        <strong>Denise Brown</strong>, Design &amp; Quality Assurance<br>
        <strong>Sharon Turner</strong>, Accounting Department<br>
        <strong>Stacy Mazerolle</strong>, Administration<br>
        <strong>Rob Aiton</strong>, Purchasing<br>
        <strong>Graham Moore</strong>, PreFab Panel Manager<br>
        <strong>Richard Buxton</strong>, Sales Rep/Manager for Nova Scotia<br>
        <strong>Earl MacLeod</strong>, Sales Rep/Manager for Prince Edward Island<br>
        <strong>Ronald Irving</strong>, Sales Rep/Manager for Quebec<br>
        <strong>George Rodgers</strong>, Sales Rep/Manager for Labrador<br>
        <strong>Colin Butt</strong>, Sales Rep/Manager for West Newfoundland<br>
        <strong>Tom Lush</strong>, Sales Rep/Manager for East Newfoundland<br>
        <strong>Eugene Stagg</strong>, Maintenance Manager for East<br>
        <strong>Claude Belanger</strong>, Maintenance Manager for Quebec<br></p>


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

        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ca/maps?q=98+Cougle+Rd,+Sussex+Corner,+NB+E4E+2S6&amp;ie=UTF8&amp;hq=&amp;hnear=98+Cougle+Rd,+Sussex+Corner,+New+Brunswick+E4E+2S6&amp;t=m&amp;z=14&amp;ll=45.72463,-65.470922&amp;output=embed"></iframe><br /><small><a href="https://maps.google.ca/maps?q=98+Cougle+Rd,+Sussex+Corner,+NB+E4E+2S6&amp;ie=UTF8&amp;hq=&amp;hnear=98+Cougle+Rd,+Sussex+Corner,+New+Brunswick+E4E+2S6&amp;t=m&amp;z=14&amp;ll=45.72463,-65.470922&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>

        <div class="divider half-margins"><!-- divider --></div>

        <h4 class="font300">Business Hours</h4>

        <p>
            <span class="block"><strong>Monday - Friday:</strong> 8am to 5pm</span>
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