@extends('vcms.base')

@section('browser-title')
    Login
@stop

@section('breadcrumb')
    / Login
@stop

@section('content')

    <!-- LOGIN -->
    <div class="col-md-3 col-sm-3"></div>
    <div class="col-md-6 col-sm-6">

        <!-- login form -->
        {{ Form::open(array(
             'url' => '/admin/login',
             'role' => 'form',
             'name' => 'bookform',
             'id' => 'bookform',
             'method' => 'post',
             'class' => 'sky-form boxed'
             ))
         }}
        <header>Login</header>

        <fieldset>

            <section>
                <label class="input">
                    <i class="icon-append fa fa-envelope"></i>
                    {{ Form::email('email', null, array('class' => 'required email form-control',
                        'placeholder' => 'you@example.com',
                        'autofocus'=>'autofocus')); }}
                </label>
            </section>

            <section>
                <label class="input">
                    <i class="icon-append fa fa-lock"></i>
                    {{ Form::password('password', array('class' => 'form-control required',
                        'placeholder' => 'Password')); }}
                </label>
                <div class="note"><a href="/password/remind">Forgot Password?</a></div>
            </section>

        </fieldset>
        <footer>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
        </footer>
        {{ Form::close() }}
        <!-- /login form -->

    </div>

@stop



@section('bottom-js')
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