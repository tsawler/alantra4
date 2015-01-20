<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>vCMS Administration</title>
    <!-- bootstrap and font awesome -->
    <link href="/packages/verilion/vcms/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/packages/verilion/vcms/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- animation and style -->
    <link href="/packages/verilion/vcms/admin/css/animate.css" rel="stylesheet">
    <link href="/packages/verilion/vcms/admin/css/style.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/packages/verilion/vcms/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/packages/verilion/vcms/admin/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">

    <!-- calendar & datepicker -->
    <link rel="stylesheet" href="/packages/verilion/vcms/css/datepicker.css">
    <link rel="stylesheet" href="/packages/verilion/vcms/fullcal/fullcalendar.min.css">
    <link rel="stylesheet" href="/packages/verilion/vcms/css/pnotify.custom.min.css">
    <link rel="stylesheet" href="/packages/verilion/vcms/css/admin.css">

</head>

@if (Session::has('mini-navbar'))
    <body class="fixed-nav mini-navbar">
@else
    <body class="fixed-nav">
@endif
    <div id="wrapper">

        @include('vcms::partials.admin-nav')

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                            <i class="fa fa-bars"></i>
                        </a>

                    </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">
                                    Welcome to vCMS Administration
                                </span>
                            </li>
                            <li>
                                <a href="/admin/logout">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>
                </nav>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    @yield('top-white')
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content">
                        <div class="row">

                                @yield('content')

                                @yield('bottom-panel')
                        </div>
                        <div class="footer fixed">
                            <div class="pull-right">
                                <strong>Copyright</strong> &copy; <?= date('Y') ?> Verilion Inc.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Required scripts -->
    <script src="/packages/verilion/vcms/admin/js/jquery-2.1.1.js"></script>
    <script src="/packages/verilion/vcms/admin/js/bootstrap.min.js"></script>
    <script src="/packages/verilion/vcms/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/packages/verilion/vcms/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="/packages/verilion/vcms/admin/js/plugins/flot/jquery.flot.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/packages/verilion/vcms/admin/js/inspinia.js"></script>
    <script src="/packages/verilion/vcms/admin/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="/packages/verilion/vcms/admin/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Data Tables -->
    <script src="/packages/verilion/vcms/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/packages/verilion/vcms/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/packages/verilion/vcms/admin/js/plugins/dataTables/dataTables.responsive.js"></script>

    <!-- ckeditor -->
    <script src="/packages/verilion/vcms/ck/ckeditor.js"></script>
    <script src="/packages/verilion/vcms/ck/adapters/jquery.js"></script>

    <!-- validator -->
    <script src="/packages/verilion/vcms/js/jquery.validate.min.js"></script>

    <!-- bootbox -->
    <script src="/packages/verilion/vcms/js/bootbox.min.js"></script>

    <!-- Flot -->
    <script src="/packages/verilion/vcms/admin/js/plugins/flot/jquery.flot.js"></script>
    <script src="/packages/verilion/vcms/admin/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/packages/verilion/vcms/admin/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/packages/verilion/vcms/admin/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/packages/verilion/vcms/admin/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- others -->
    <script src="/packages/verilion/vcms/js/bootstrap-datepicker.min.js"></script>
    <script src="/packages/verilion/vcms/fullcal/lib/moment.min.js"></script>
    <script src="/packages/verilion/vcms/fullcal/fullcalendar.min.js"></script>
    <script src="/packages/verilion/vcms/js/pnotify.custom.min.js"></script>
    <script src="/packages/verilion/vcms/admin/js/jquery.cookie.js"></script>

    @include('vcms::partials.messages')
    @yield('bottom-js')
</body>
</html>
