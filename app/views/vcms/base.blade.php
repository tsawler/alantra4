<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Alantra: @yield('browser-title')</title>
    <meta name="keywords" content="{{ $meta_tags }}" />
    <meta name="description" content="{{ $meta }}" />
    <meta name="Author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

    <!-- WEB FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

    <!-- CORE CSS -->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/sky-forms.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/weather-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/line-icons.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/owl-carousel/owl.pack.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/flexslider.css" rel="stylesheet" type="text/css" />

    <!-- REVOLUTION SLIDER -->
    <link href="/assets/css/revolution-slider.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/layerslider.css" rel="stylesheet" type="text/css" />

    <!-- THEME CSS -->
    <link href="/assets/css/essentials.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/header-default.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/footer-default.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/color_scheme/red.css" rel="stylesheet" type="text/css" id="color_scheme" />
    <link href="/assets/css/color_scheme/darkblue.css" rel="stylesheet" type="text/css" id="color_scheme">

    <!-- Morenizr -->
    <script type="text/javascript" src="/assets/plugins/modernizr.min.js"></script>

    <!--[if lte IE 8]>
    <script src="/assets/plugins/respond.js"></script>
    <![endif]-->
    @include("vcms::partials.vcms-css")
    <style>
        #topNav form.search {
            float:right;
            max-width:160px;
            margin:12px 0 0 0;
            padding:0;
        }
    </style>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1064340703677336');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=1064340703677336&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Google Tag manager -->
    <!-- Global site tag (gtag.js) - AdWords: 1039606680 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-1039606680"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-1039606680'); </script>
</head>

<body class="smoothscroll">

<div id="wrapper">

    @include('vcms.partials.top-nav')

            <!-- mobile only -->
    <div class="visible-xs well text-center">
        <a class="btn btn-primary" href="tel:18004561800">Click to Call</a>
        <a class="btn btn-primary" href="/quote">Request Quote</a>
    </div>


    <!-- PAGE TOP -->
    <section class="page-title">
        <div class="container">

            <header>

                <ul class="breadcrumb pull-right"><!-- breadcrumb -->
                    <li><a href="/">{{ Lang::get('vcms::menu.home') }}</a> </li>
                    @yield('breadcrumb')
                </ul><!-- /breadcrumb -->

                <h2><!-- Page Title -->
                    @yield('title')
                </h2><!-- /Page Title -->

            </header>

        </div>
    </section>
    <!-- /PAGE TOP -->

    @yield('banner')

    <!-- CONTENT -->
    <section>
        <div class="container">
            @yield('content')
        </div>
    </section>
    <!-- /CONTENT -->

    @include('vcms.partials.page-footer')