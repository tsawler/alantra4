<!-- FOOTER -->
<footer id="footer">
    <div class="container">

        <div class="row">

            <!-- col #1 -->
            <div class="spaced col-md-3 col-sm-4 hidden-xs dark">

                <h4>Contact <strong>Alantra</strong></h4>
                <p class="block">
                    98 Cougle Road<br>
                    Sussex NB E4E 5L5<br>
                    Email: info@alantraleasing.com<br>
                    Toll Free: 800-456-1800<br>
                    Phone: 506-443-3757<br>
                    Fax: 506-432-9076<br>
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

            </div>
            <!-- /col #2 -->

            <!-- col #3 -->
            <div class="spaced col-md-3 col-sm-4 hidden-xs">
                <h4>Recent <strong>Tweets</strong></h4>
                <ul class="list-unstyled fsize13">
                    <li>
                        <i class="fa fa-twitter"></i> <a href="#">@John Doe</a> Pilsum dolor lorem sit consectetur adipiscing orem sequat <small class="ago">8 mins ago</small>
                    </li>
                    <li>
                        <i class="fa fa-twitter"></i> <a href="#">@John Doe</a> Remonde sequat ipsum dolor lorem sit consectetur adipiscing  <small class="ago">8 mins ago</small>
                    </li>
                    <li>
                        <i class="fa fa-twitter"></i> <a href="#">@John Doe</a> Imperdiet condimentum diam dolor lorem sit consectetur adipiscing <small class="ago">8 mins ago</small>
                    </li>
                </ul>
            </div>
            <!-- /col #3 -->

            <!-- col #4 -->
            <div class="spaced col-md-3 col-sm-4">
                <h4>About <strong>Us</strong></h4>
                <p>
                    Some pithy, catchy text goes here.
                </p>

                <h4><small><strong>Subscribe to our Newsletter</strong></small></h4>
                <form id="newsletterSubscribe" method="post" action="php/newsletter.php" class="input-group">
                    <input required type="email" class="form-control" name="newsletter_email" id="newsletter_email" value="" placeholder="E-mail Address">
								<span class="input-group-btn">
									<button class="btn btn-primary">SUBMIT</button>
								</span>
                </form>

            </div>
            <!-- /col #4 -->

        </div>

    </div>

    <hr />

    <div class="copyright">
        <div class="container text-center fsize12">
            All Right Reserved &copy; {{ date('Y') }} Alantra Leasing Inc. &nbsp;
            <a href="/privacy-policy" class="fsize11">Privacy Policy</a> &bull;
            <a href="/terms-of-service" class="fsize11">Terms of Service</a>
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
<script type="text/javascript" src="/assets/js/scripts.js"></script>
@include("vcms::partials.vcms-js")
@include('vcms::partials.messages')
@yield('bottom-js')
</body>
</html>