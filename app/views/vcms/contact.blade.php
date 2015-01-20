@extends('vcms.base')



@section('content')

    <!-- FORM -->
    <div class="col-md-8">

        <h3>Send Us a Message</h3>

        <!-- Alert -->
        <div id="_sent_ok_" class="alert alert-success fade in fsize16 hide">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <span id="_msg_txt_"><strong>Thank You!</strong> Your message successfully sent!</span>
        </div><!-- /Alert -->

        {{ Form::open(array('url' => '/contact', 'role' => 'form', 'name' => 'bookform', 'id' => 'bookform', 'method' => 'post')) }}

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
                    <label>Subject</label>
                    <input type="text" value="" maxlength="100" class="form-control required" name="contact_subject" id="contact_subject">
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
                <input type="submit" value="Send Message" class="btn btn-primary btn-lg" id="contact_submit" />
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
            <span class="block"><strong><i class="fa fa-phone"></i> Fax:</strong> <a href="tel:5064329076">506-432-9076</a></span>
            <span class="block"><strong><i class="fa fa-envelope"></i> Email:</strong> <a href="mailto:info@alantraleasing.com">info@alantraleasing</a></span>
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