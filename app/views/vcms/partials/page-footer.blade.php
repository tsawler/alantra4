<!-- FOOTER -->
<footer id="footer">
    <div class="container">

        <div class="row">

            <!-- col #1 -->
            <div class="spaced col-md-3 col-sm-4 hidden-xs dark">

                <h4>{{ Lang::get('home.contact_alantra') }}</h4>
                <p class="block">
                    98 Cougle Road<br>
                    Sussex NB E4E 5L5<br>
                    {{ Lang::get('home.email') }}: info@alantraleasing.com<br>
                    {{ Lang::get('home.toll_free') }}: 800-456-1800<br>
                    {{ Lang::get('home.phone') }}: 506-433-3757<br>
                    {{ Lang::get('home.fax') }}: 506-432-9076<br>
                </p>

                <p class="block"><!-- social -->
                    <a href="https://twitter.com/AlantraLeasing" target="_blank" class="social fa fa-twitter"></a>
                    <a href="https://www.facebook.com/alantratrailers" target="_blank"  class="social fa fa-facebook"></a>
                    <a href="https://www.linkedin.com/company/5065231" target="_blank" class="social fa fa-linkedin"></a>
                </p><!-- /social -->
            </div>
            <!-- /col #1 -->

            <!-- col #2 -->
            <div class="spaced col-md-3 col-sm-4 hidden-xs">
                <h4>Share <strong>This Page</strong></h4>
                <div class="share-button" style="margin-top: 8px;"></div>
            </div>
            <!-- /col #2 -->

            <!-- col #3 -->
            <div class="spaced col-md-3 col-sm-4 hidden-xs">
                <h4>{{ Lang::get('home.customer_testimonials') }}</h4>
                <ul class="list-unstyled fsize13">
                    <ul class="list-unstyled fsize13">
                        <?php
                        $tests = Testimonial::orderByRaw("RANDOM()")->take(3)->get();
                        ?>
                        @foreach($tests as $t)
                            <?php
                            if (strlen($t->testimonial) > 40){
                                $test_short = substr(strip_tags($t->testimonial), 0, 145) . "...";
                            } else {
                                $test_short = strip_tags($t->testimonial);
                            }
                            ?>
                            <li>
                                <i class="fa fa-user"></i>&nbsp;&nbsp;{{ $test_short }}
                            </li>
                        @endforeach
                    </ul>
                </ul>
            </div>
            <!-- /col #3 -->

            <!-- col #4 -->
            <div class="spaced col-md-3 col-sm-4">
                <h4>{{ Lang::get('home.subscribe_to') }}</h4>
                <form method="post" action="/subscribe" class="input-group">
                    <input required type="email" class="form-control" name="email" id="newsletter_email" value="" placeholder="{{ Lang::get('home.email_address') }}">
								<span class="input-group-btn">
									<button class="btn btn-primary">{{ Lang::get('home.submit') }}</button>
								</span>
                </form>

            </div>
            <!-- /col #4 -->

        </div>

        <!-- mobile only -->
        <div class="visible-xs well text-center">
            <a href="https://twitter.com/AlantraLeasing" target="_blank" class="social fa fa-twitter"></a>
            <a href="https://www.facebook.com/alantratrailers" target="_blank"  class="social fa fa-facebook"></a>
            <a href="https://www.linkedin.com/company/5065231" target="_blank" class="social fa fa-linkedin"></a>
        </div>


    </div>

    <hr />

    <div class="copyright">
        <div class="container text-center fsize12">
            {{ Lang::get('home.all_rights') }} &copy; {{ date('Y') }} Alantra Leasing Inc. &nbsp;
            <a href="/privacy-policy" class="fsize11">{{ Lang::get('home.privacy_policy') }}</a> &bull;
            <a href="/sitemap">{{ Lang::get('home.sitemap') }}</a>
        </div>
    </div>
</footer>
<!-- /FOOTER -->

<a href="#" id="toTop"></a>

</div><!-- /#wrapper -->

<!-- JAVASCRIPT FILES -->
<script type="text/javascript" src="/assets/plugins/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="/assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="/assets/js/scripts.js"></script>

<!-- REVOLUTION SLIDER -->
<script type="text/javascript" src="/assets/plugins/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/assets/plugins/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/assets/js/revolution_slider.js"></script>

<script type="text/javascript" src="/assets/js/share.min.js"></script>

@include("vcms::partials.vcms-js")
@include('vcms::partials.messages')
@if (Session::get('lang') == 'fr')
    <script type="text/javascript" src="/assets/js/messages_fr.js"></script>
@endif
<script>
    $(document).ready(function(){
        new Share(".share-button", {
            networks: {

            }
        });
    });

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-63805407-1', 'auto');
    ga('send', 'pageview');

</script>

<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1039606680/?guid=ON&amp;script=0"/>
    </div>
</noscript>
@yield('bottom-js')

<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1039606680/?guid=ON&amp;script=0"/>
    </div>
</noscript>
</body>
</html>