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
    <div class="fullwidthbanner-container">
        <div class="owl-carousel controlls-over"
             data-plugin-options='{
                                "items": 4,
                                "singleItem": true,
                                "navigation": true,
                                "autoPlay": true,
                                "pagination": false}'>
            <div>
                <img alt="" class="img-responsive" src="/assets/custom/images/rotating/location_map_en.jpg">
            </div>
        </div>
    </div>
@stop

@section('content')

    <!-- FORM -->
    <div class="col-md-8">
        <p>
            Téléphonez-nous simplement ou envoyez-nous un courriel pour obtenir de l’aide de notre personnel
            chevronné, que ce soit pour une analyse de vos besoins, une évaluation de projet ou des recommandations
            ou des renseignements sur des choses comme la fabrication, l’installation ou la livraison.
        </p>
        <p>
            Vous pouvez aussi <a href="/quote">Demander un estimé</a> et nous communiquerons avec vous dans les deux
            heures qui
            suivront. C’est là notre engagement.
        </p>

        <p><a class="btn btn-primary" href="/quote">Demander un estimé</a></p>

        <p>
            Vous pouvez également rejoindre un membre de l’équipe de notre siège social pour obtenir une rencontre
            individuelle ou fixer une visite pour voir notre grand choix de produits et services.
            <a href="https://www.google.ca/maps/place/98+Cougle+Rd,+Sussex+Corner,+NB+E4E+2S6/@45.7246302,-65.4709224,15z/data=!4m2!3m1!1s0x4ca722cec36ef9bb:0xc52dd29c7a4db238"
               target="_blank">Comment nous trouver</a>.
        </p>

        <p>
            Nos <a href="/distribution-centres">centres de distribution</a> sont situés à des endroits facilement
            accessibles dans tout l’Est canadien.
            Les coordonnées sont inscrites sous chaque centre de distribution.
        </p>

        <strong>Siège social et usine de fabrication Alantra</strong><br>
        <br>
        <i class="fa fa-fw fa-map-marker"></i> 98, ch Cougle, Sussex, N.-B. E4E 5L5<br>
        <a href="tel:18004561800"><i class="fa fa-fw fa-phone"></i></a> Tél sans frais : 800-456-1800</a><br>
        <a href="tel:15064333757"><i class="fa fa-fw fa-phone"></i></a> Téléphone: 506-433-3757</a><br>
        <i class="fa fa-fw fa-fax"></i> Télécopieur : 506-432-9076<br>
        <a href="mailto:info@alantraleasing.com"><i class="fa fa-fw fa-envelope"></i> info@alantraleasing.com</a>
        <br><br>

        <strong>Équipe du siège social d’Alantra</strong><br><br>
        <strong>Marcus deWinter</strong>, président et gérant général<br>
        <strong>Melissa Brown</strong>, représentante des ventes/marketing<br>
        <strong>Kim Benson</strong>, représentante des ventes<br>
        <strong>Mark Green</strong>, contrôleur<br>
        <strong>Mary Maxwell</strong>, service de comptabilité<br>
        <strong>Rebecca Richardson</strong>, gérante des exploitations, Service<br>
        <strong>Ryan Colpitts</strong>, design<br>
        <strong>Denise Brown</strong>, design et assurance de la qualité<br>
        <strong>Sharon Turner</strong>, service de comptabilité<br>
        <strong>Stacy Mazerolle</strong>, administration<br>
        <strong>Rob Aiton</strong>, approvisionnement<br>
        <strong>Richard Buxton</strong>, rep. des ventes/gérant pour la Nouvelle-Écosse<br>
        <strong>Earl MacLeod</strong>, rep. des ventes/gérant pour l’Île-du-Prince-Édouard<br>
        <strong>Ronald Irving</strong>, rep. des ventes/gérant pour le Québec<br>
        <strong>George Rodgers</strong>, rep. des ventes/gérant pour le Labrador<br>
        <strong>Colin Butt</strong>, rep. des ventes/gérant pour l’Ouest de Terre-Neuve<br>
        <strong>Tom Lush</strong>, rep. des ventes/gérant pour l’Est de Terre-Neuve<br>
        <strong>Eugene Stagg</strong>, gestionnaire de maintenance pour l'Est de Terre-Neuve<br>
        <strong>Claude Belanger</strong>, gérant de l’entretien pour le Québec<br>
        <strong>Melissa de Winter</strong>, représentante des ventes<br>
        <strong>Erika de Winter</strong>, commercialisation<br>
        <strong>Matthew Allan</strong>, conception et assurance de la qualité</p></p>


        <hr>

        {{ Form::open(array('url' => '/contact', 'role' => 'form', 'name' => 'bookform', 'id' => 'bookform', 'method' => 'post')) }}

        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label>Nom complet *</label>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" value="" maxlength="100" class="form-control required" name="contact_name"
                               id="contact_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Adresse courriel *</label>

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
                    <label>Objet</label>

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
                <input type="submit" value="Envoyer le message" class="btn btn-primary btn-lg" id="contact_submit"/>
            </div>
        </div>
        {{ Form::close() }}

    </div>
    <!-- /FORM -->


    <!-- INFO -->
    <div class="col-md-4">

        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://maps.google.ca/maps?q=98+Cougle+Rd,+Sussex+Corner,+NB+E4E+2S6&amp;ie=UTF8&amp;hq=&amp;hnear=98+Cougle+Rd,+Sussex+Corner,+New+Brunswick+E4E+2S6&amp;t=m&amp;z=14&amp;ll=45.72463,-65.470922&amp;output=embed"></iframe>
        <br/>
        <small>
            <a href="https://maps.google.ca/maps?q=98+Cougle+Rd,+Sussex+Corner,+NB+E4E+2S6&amp;ie=UTF8&amp;hq=&amp;hnear=98+Cougle+Rd,+Sussex+Corner,+New+Brunswick+E4E+2S6&amp;t=m&amp;z=14&amp;ll=45.72463,-65.470922&amp;source=embed"
               style="color:#0000FF;text-align:left">View Larger Map</a></small>

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