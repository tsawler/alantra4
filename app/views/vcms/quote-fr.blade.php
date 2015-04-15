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
    Demander un estimé
    @if(strlen($interested_in) > 0)
        : {{ $interested_in }}
    @endif
@stop

@section('banner')
    <div class="slider fullwidthbanner-container roundedcorners">
        <div class="fullwidthbanner">
            <img src="/page_images/writing.jpg">
        </div>
    </div>
@stop

@section('content')

    <!-- FORM -->
    <div class="col-md-2"></div>

    <div class="col-md-8">

        <p>Si vous connaissez les spécifications de votre projet, veuillez simplement compléter le formulaire ci-bas et nous communiquerons avec vous sans délai pour toute question et/ou pour vous donner un estimé.  Vous pouvez aussi nous téléphoner ou nous envoyer un courriel pour demander notre aide afin de vous aider à choisir les meilleures solutions pour satisfaire vos besoins.</p>

        <p>
            <a href="tel:18004561800>"<i class="fa fa-fw fa-phone"></i></a> Sans frais : 800-456-1800<br>
            <a href="tel:15064333757"><i class="fa fa-fw fa-phone"></i></a> Téléphone : 506-433-3757<br>
            <i class="fa fa-fw fa-fax"></i> Télécopieur : 506-432-9076<br>
            <a href mailto:'info@alantraleasing.com'><i class="fa fa-fw fa-envelope"></i> info@alantraleasing.com</a>
        </p>


        {{ Form::open(array('url' => '/quote', 'role' => 'form', 'name' => 'bookform', 'id' => 'bookform', 'method' => 'post')) }}

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Entreprise  *</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control required" name="company" id="company">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label>Nom complet *</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control required" name="full_name" id="full_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Adresse courriel *</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" value="" maxlength="100" class="form-control required" name="email" id="email">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Téléphone</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control" name="phone" id="phone">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Addresse</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control" name="address" id="address">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Ville/Village</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-info"></i></span>
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
                        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
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
                    <label>Requis pour quelle date</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control" name="date_needed" id="date">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <label>Produits</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-gear"></i></span>
                        <input type="text" value="{{ $interested_in }}" maxlength="100" class="form-control" name="interested_in">
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
                <input type="submit" value="Estimé demandé" class="btn btn-primary btn-lg" id="contact_submit" />
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