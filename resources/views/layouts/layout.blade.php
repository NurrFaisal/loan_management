
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img')}}/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
{{--    <link rel="stylesheet" href="{{asset('/assets/bootstrap/dist/css/bootstrap.css')}}">--}}
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}/owl.theme.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('assets/js')}}/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Start Header Top Area -->
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#"><img src="{{asset('assets/img')}}/logo/sometylogo.jpg" alt="" /></a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Header Top Area -->
<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li class="active"><a href="{{route('dashboard')}}"> Daily Calection</a></li>
                            <li><a data-toggle="collapse" data-target="#demoevent" href="#">New Samety</a>
                                <ul id="demoevent" class="collapse dropdown-header-top">
                                    <li><a href="inbox.html">Inbox</a></li>
                                    <li><a href="view-email.html">View Email</a></li>
                                    <li><a href="compose-email.html">Compose Email</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#democrou" href="#">New Member</a>
                                <ul id="democrou" class="collapse dropdown-header-top">
                                    <li><a href="animations.html">Animations</a></li>
                                    <li><a href="google-map.html">Google Map</a></li>
                                    <li><a href="data-map.html">Data Maps</a></li>
                                    <li><a href="code-editor.html">Code Editor</a></li>
                                    <li><a href="image-cropper.html">Images Cropper</a></li>
                                    <li><a href="wizard.html">Wizard</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demolibra" href="#">New Loan</a>
                                <ul id="demolibra" class="collapse dropdown-header-top">
                                    <li><a href="flot-charts.html">Flot Charts</a></li>
                                    <li><a href="bar-charts.html">Bar Charts</a></li>
                                    <li><a href="line-charts.html">Line Charts</a></li>
                                    <li><a href="area-charts.html">Area Charts</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demodepart" href="#">Empolyee</a>
                                <ul id="demodepart" class="collapse dropdown-header-top">
                                    <li><a href="normal-table.html">Normal Table</a></li>
                                    <li><a href="data-table.html">Data Table</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demo" href="#">Cash Book</a>
                                <ul id="demo" class="collapse dropdown-header-top">
                                    <li><a href="form-elements.html">Form Elements</a></li>
                                    <li><a href="form-components.html">Form Components</a></li>
                                    <li><a href="form-examples.html">Form Examples</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Vaucher</a>
                                <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                    <li><a href="notification.html">Notifications</a>
                                    </li>
                                    <li><a href="alert.html">Alerts</a>
                                    </li>
                                    <li><a href="modals.html">Modals</a>
                                    </li>
                                    <li><a href="buttons.html">Buttons</a>
                                    </li>
                                    <li><a href="tabs.html">Tabs</a>
                                    </li>
                                    <li><a href="accordion.html">Accordion</a>
                                    </li>
                                    <li><a href="dialog.html">Dialogs</a>
                                    </li>
                                    <li><a href="popovers.html">Popovers</a>
                                    </li>
                                    <li><a href="tooltips.html">Tooltips</a>
                                    </li>
                                    <li><a href="dropdown.html">Dropdowns</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                <ul id="Pagemob" class="collapse dropdown-header-top">
                                    <li><a href="contact.html">Contact</a>
                                    </li>
                                    <li><a href="invoice.html">Invoice</a>
                                    </li>
                                    <li><a href="typography.html">Typography</a>
                                    </li>
                                    <li><a href="color.html">Color</a>
                                    </li>
                                    <li><a href="login-register.html">Login Register</a>
                                    </li>
                                    <li><a href="404.html">404 Page</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
<!-- Main Menu area start-->
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li><a href="{{route('dashboard')}}"> Daily Calection</a>
                    </li>
                    <li><a  href="{{route('somitee')}}"> Somitees</a>
                    </li>
                    <li><a  href="{{route('member')}}">Members</a>
                    </li>
                    <li><a href="{{route('loan')}}"> Loan</a>
                    </li>
                    <li><a href="{{route('employee')}}"> Empolyee</a>
                    </li>
                    <li><a href="{{route('cashbook')}}"> Cashbook</a>
                    </li>
                    <li><a  href="{{route('due-collection')}}"> Due Collection</a>
                    </li>
                    <li><a href="{{route('voucher')}}"> Voucher</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!-- Main Menu area End-->
<!-- Start Status area -->
<!-- Normal Table area Start-->
@yield('content')
<!-- Normal Table area End-->


<!-- Start Footer area-->
<div class="footer-copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-copy-right">
                    <p>Copyright © 2025
                        . All rights reserved. <a href="#">Gramin co sosaity</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer area-->
<!-- jquery
    ============================================ -->
<script src="{{asset('assets/js')}}/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{asset('assets/js')}}/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="{{asset('assets/js')}}/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="{{asset('assets/js')}}/jquery-price-slider.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="{{asset('assets/js')}}/owl.carousel.min.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="{{asset('assets/js')}}/jquery.scrollUp.min.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="{{asset('assets/js')}}/meanmenu/jquery.meanmenu.js"></script>
<!-- counterup JS
    ============================================ -->
<script src="{{asset('assets/js')}}/counterup/jquery.counterup.min.js"></script>
<script src="{{asset('assets/js')}}/counterup/waypoints.min.js"></script>
<script src="{{asset('assets/js')}}/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="{{asset('assets/js')}}/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- jvectormap JS
    ============================================ -->
{{--<script src="{{asset('assets/js')}}/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>--}}
{{--<script src="{{asset('assets/js')}}/jvectormap/jquery-jvectormap-world-mill-en.js"></script>--}}
{{--<script src="{{asset('assets/js')}}/jvectormap/jvectormap-active.js"></script>--}}
<!-- sparkline JS
    ============================================ -->
<script src="{{asset('assets/js')}}/sparkline/jquery.sparkline.min.js"></script>
<script src="{{asset('assets/js')}}/sparkline/sparkline-active.js"></script>
<!-- sparkline JS
    ============================================ -->
<script src="{{asset('assets/js')}}/flot/jquery.flot.js"></script>
<script src="{{asset('assets/js')}}/flot/jquery.flot.resize.js"></script>
<script src="{{asset('assets/js')}}/flot/curvedLines.js"></script>
<script src="{{asset('assets/js')}}/flot/flot-active.js"></script>
<!-- knob JS
    ============================================ -->
{{--<script src="{{asset('assets/js')}}/knob/jquery.knob.js"></script>--}}
{{--<script src="{{asset('assets/js')}}/knob/jquery.appear.js"></script>--}}
{{--<script src="{{asset('assets/js')}}/knob/knob-active.js"></script>--}}
<!--  wave JS
    ============================================ -->
{{--<script src="{{asset('assets/js')}}/wave/waves.min.js"></script>--}}
{{--<script src="{{asset('assets/js')}}/wave/wave-active.js"></script>--}}
<!--  todo JS
    ============================================ -->
<script src="{{asset('assets/js')}}/todo/jquery.todo.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="{{asset('assets/js')}}/plugins.js"></script>
<!--  Chat JS
    ============================================ -->
<script src="{{asset('assets/js')}}/chat/moment.min.js"></script>
<script src="{{asset('assets/js')}}/chat/jquery.chat.js"></script>
<!-- main JS
    ============================================ -->
<script src="{{asset('assets/js')}}/main.js"></script>
<!-- tawk chat JS
    ============================================ -->
{{--<script src="{{asset('assets/js')}}/tawk-chat.js"></script>--}}
</body>

</html>

