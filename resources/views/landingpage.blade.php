<!DOCTYPE html>

@php
    $profile_pic = asset('images/profile.jpg');
    $front = asset('images/img-1.jpg');
@endphp

<html lang="en-US">


<!-- home-100:13-->

<head>
    <title>Orbeva</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <meta name="author" content="Nile-Theme">
    <meta name="robots" content="index follow">
    <meta name="googlebot" content="index follow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords"
        content="cargo, clean, contractor, corporate, freight, industry, localization, logistics, modern, shipment, transport, transportation, truck, trucking">
    <meta name="description" content="Transportation and Logistics Responsive HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CPoppins:300i,300,400,500,600,700,400i,500%7CDancing+Script:700%7CDancing+Script:700%7CGreat+Vibes:400%7CPoppins:400%7CDosis:800%7CRaleway:400,700,800&amp;subset=latin-ext"
        rel="stylesheet">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('assets2/css/animate.css') }}" />
    <!-- owl Carousel assets -->
    <link href="{{ asset('assets2/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/css/owl.theme.css') }}" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}">
    <!-- hover anmation -->
    <link rel="stylesheet" href="{{ asset('assets2/css/hover-min.css') }}">
    <!-- flag icon -->
    <link rel="stylesheet" href="{{ asset('assets2/css/flag-icon.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}">
    <!-- elegant icon -->
    <link rel="stylesheet" href="{{ asset('assets2/css/elegant_icon.css') }}">
    <!-- fontawesome  -->
    <link rel="stylesheet" href="{{ asset('assets2/fonts/font-awesome/css/font-awesome.min.css') }}">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets2/rslider/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets2/rslider/fonts/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/rslider/css/settings.css') }}">
</head>

<body>
    <header>
        <div id="fixed-header-dark" class="header-output fixed-header">
            <div class="header-output">
                <div class="container header-in">

                    <!-- // Up Head -->

                    <div class="position-relative">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <a id="logo" href="home-1.html"
                                    class="d-inline-block margin-tb-15px h2 text-light">
                                    <i class="fa fa-layer-group mr-2"></i>
                                    Orbeva
                                </a>
                                <a class="mobile-toggle padding-15px background-second-color border-radius-3"
                                    href="#"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="col-lg-7 col-md-12 position-inherit">
                                <ul id="menu-main"
                                    class="nav-menu float-xl-left text-lg-center link-padding-tb-25px white-link dropdown-dark">
                                    <li class="has-]"><a href="#">Home</a>
                                        {{-- <ul class="sub-menu">
                                            <li><a href="home-1.html">Home - Main Demo</a></li>
                                            <li><a href="home-2.html">Home - Classic Layout</a></li>
                                            <li><a href="home-3.html">Home - Modern Layout</a></li>
                                            <li><a href="home-4.html">Home - Marine Transport</a></li>
                                            <li><a href="home-5.html">Home - Moving Co</a></li>
                                            <li><a href="home-6.html">Home - Company</a></li>
                                        </ul> --}}
                                    </li>
                                    @if (Route::has('transporter.login'))
                                        @auth
                                            <li class="has-dropdown">
                                                <a href="#">
                                                    <span class="text-teal px-2">
                                                        <i class="fa fa-user fs-4"></i>
                                                    </span>
                                                    <span>{{ Auth::user()->name }}</span>
                                                    <i class="bi bi-chevron-down toggle-dropdown"></i>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li><a
                                                            href="{{ route(Auth::user()->role . '.dashboard') }}">Dashboard</a>
                                                    </li>
                                                    <li><a
                                                            href="{{ route(Auth::user()->role . '.showProfile') }}">Profile</a>
                                                    </li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <li><a href="route('logout')"
                                                                onclick="event.preventDefault();
                                        this.closest('form').submit();">Log
                                                                Out</a></li>
                                                    </form>
                                                    <!-- <li><a href="#">Deep Dropdown 4</a></li> -->
                                                </ul>
                                            </li>
                                        @else
                                            <li class="has-dropdown"><a href="#"><span>Login/Register</span> <i
                                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{ route('transporter.login') }}">Login</a></li>
                                                    <li><a href="{{ route('transporter.register') }}">Register</a></li>
                                                </ul>
                                            </li>
                                        @endauth
                                    @endif

                                </ul>


                                {{-- <div class="d-none d-xl-block search-link pull-right model-link margin-top-15px">
                                    <a id="search-header"
                                        class="h4 model-link margin-right-0px text-white opacity-hover-8"
                                        href="#search">
                                        <i class="fa fa-circle-user"></i>
                                    </a>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- // Header  -->


    <div id="rev_slider_3_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="nile-logistics-1"
        data-source="gallery"
        style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.4.8 fullwidth mode -->
        <div id="rev_slider_3_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.8">
            <ul>
                <!-- SLIDE  -->
                <li data-index="rs-3" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                    data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                    data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('assets2/rslider/assets/5ec5e-slider-1.jpg') }}"alt=""
                        data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                        class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption   tp-resizeme" id="slide-3-layer-1"
                        data-x="['left','left','left','center']" data-hoffset="['0','41','45','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-111','-143','-186','-36']"
                        data-width="461" data-height="173" data-whitespace="nowrap" data-type="text"
                        data-responsive_offset="on"
                        data-frames='[{"delay":10,"speed":1140,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','center']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 5; min-width: 461px; max-width: 461px; max-width: 173px; max-width: 173px; white-space: nowrap; font-size: 50px; line-height: 59px; font-weight: 400; color: #ffffff; letter-spacing: -4px;font-family:Poppins;">
                        Making<br> Feri Applications
                        <br> Fast & Savy
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption rev-btn " id="slide-3-layer-2" data-x="['left','left','left','center']"
                        data-hoffset="['0','41','45','0']" data-y="['top','top','top','top']"
                        data-voffset="['453','372','435','471']" data-width="none" data-height="none"
                        data-whitespace="nowrap" data-type="button" data-responsive_offset="on"
                        data-responsive="off"
                        data-frames='[{"delay":640,"speed":1120,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:transparent;bc:rgb(255,255,255);"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]"
                        data-paddingright="[35,35,35,35]" data-paddingbottom="[12,12,12,12]"
                        data-paddingleft="[35,35,35,35]"
                        style="z-index: 6; white-space: nowrap; font-size: 14px; line-height: 17px; font-weight: 500; color: rgba(255,255,255,1); letter-spacing: 0px;font-family:Poppins;background-color:rgb(229,57,53);border-color:rgb(229,57,53);border-style:solid;border-width:2px 2px 2px 2px;border-radius:30px 30px 30px 30px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                        Contact Us </div>
                </li>
                <!-- SLIDE  -->
                <li data-index="rs-4" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                    data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                    data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('assets2/rslider/assets/c92f5-slider-2.jpg') }}"alt=""
                        data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                        class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption   tp-resizeme" id="slide-4-layer-1"
                        data-x="['left','left','left','center']" data-hoffset="['0','41','45','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-111','-143','-186','-36']"
                        data-width="461" data-height="173" data-whitespace="nowrap" data-type="text"
                        data-responsive_offset="on"
                        data-frames='[{"delay":10,"speed":1140,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','center']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 5; min-width: 461px; max-width: 461px; max-width: 173px; max-width: 173px; white-space: nowrap; font-size: 50px; line-height: 59px; font-weight: 400; color: #ffffff; letter-spacing: -4px;font-family:Poppins;">
                        Making<br> Feri Applications
                        <br> Fast & Savy
                    </div>

                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption rev-btn " id="slide-4-layer-2" data-x="['left','left','left','center']"
                        data-hoffset="['0','41','45','0']" data-y="['top','top','top','top']"
                        data-voffset="['453','372','435','471']" data-width="none" data-height="none"
                        data-whitespace="nowrap" data-type="button" data-responsive_offset="on"
                        data-responsive="off"
                        data-frames='[{"delay":640,"speed":1120,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:transparent;bc:rgb(255,255,255);"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]"
                        data-paddingright="[35,35,35,35]" data-paddingbottom="[12,12,12,12]"
                        data-paddingleft="[35,35,35,35]"
                        style="z-index: 6; white-space: nowrap; font-size: 14px; line-height: 17px; font-weight: 500; color: rgba(255,255,255,1); letter-spacing: 0px;font-family:Poppins;background-color:rgb(229,57,53);border-color:rgb(229,57,53);border-style:solid;border-width:2px 2px 2px 2px;border-radius:30px 30px 30px 30px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                        Contact Us </div>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
    <!-- END REVOLUTION SLIDER -->

    <div class="service-section-1 container">
        <div class="row">
            <div class="col-md-4">
                <div class="service layout-1">
                    <div class="clearfix">
                        <div class="icon"><img src="{{ asset('assets2/icons/service-light-1.png') }}"alt=""></div>
                        <a href="{{ route('transporter.login') }}" class="title">Regional Feri</a>
                    </div>
                    <div class="dis clearfix">
                        For shipments heading to DRC borders.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service layout-1">
                    <div class="clearfix">
                        <div class="icon"><img src="{{ asset('assets2/icons/service-light-2.png') }}"alt=""></div>
                        <a href="{{ route('transporter.login') }}" class="title">Continuance Feri</a>
                    </div>
                    <div class="dis clearfix">
                        For shipments coming back from DRC areas.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--============= About Us =============-->
    <div class="nile-about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <div class="section-title-right text-main-color clearfix">
                        <div class="icon"><img src="{{ asset('assets2/icons/title-icon-1.png') }}"alt=""></div>
                        <h2 class="title-text">Who We Are ?</h2>
                    </div>
                    <div class="about-text margin-tb-25px">
                        With Orbeva, transporters, vendors, and logistics companies can effortlessly apply for, manage,
                        and track FERI certificates for shipments into and across the DRC. Our platform is built to
                        deliver compliance, clarity, and efficiency in all your freight documentation.
                    </div>
                    <a href="#" class="nile-bottom sm">Read More</a>


                    <div id="accordion" class="nile-accordion margin-top-80px sm-mb-45px">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-block btn-link active" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne"><i class="fa fa-info-circle"></i> Why us
                                        ?</button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Set up your FERI applications and documentation in minutes. Our intuitive platform
                                    lets you upload, manage, and track all required documents with ease. </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-block btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo"><i class="fa fa-shield-halved"></i> Advanced
                                        Security</button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Your data and documents are protected with industry-standard encryption and secure
                                    cloud storage, ensuring confidentiality and integrity at every step. </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-block btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree"><i class="fa fa-headset"></i> Dedicated
                                        Support</button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Our support team is available to assist you with any queries or
                                    issues, ensuring your freight documentation process is smooth and hassle-free.
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-sm-6">
                            <a href="#"><img src="{{ asset('assets2/img/cart-2.jpg') }}"alt=""></a>
                        </div>
                        <div class="col-sm-6">
                            <div class="cart-service background-main-color">
                                <div class="icon"><img
                                        src="{{ asset('assets2/icons/service-light-2.png') }}"alt=""></div>
                                <h2>Air Freight</h2>
                                <hr>
                                <div class="text">Coming soon in our system, stay put for all upcoming features
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="cart-service background-main-color">
                                <div class="icon"><img
                                        src="{{ asset('assets2/icons/service-light-3.png') }}"alt=""></div>
                                <h2>Sea Freight</h2>
                                <hr>
                                <div class="text">Coming soon in our system, stay put for all upcoming features
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <a href="#"><img src="{{ asset('assets2/img/cart-1.jpg') }}"alt=""></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--============= //About Us =============-->



    <div class="call-action ba-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 padding-tb-15px">
                    <h2>Unbeatable Ease of Applying for FERI</h2>
                    <div class="text">Designed to save time and reduce errors, you will apply and feel more comfy
                        that anyone else</div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 sm-mb-45px">
                            <a href="#" class="action-bottom layout-1">
                                <img src="{{ asset('assets2/icons/small-icon-1.png') }}"alt="">
                                <h4>Tell Friend</h4>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 sm-mb-45px">
                            <a href="#" class="action-bottom layout-1">
                                <img src="{{ asset('assets2/icons/small-icon-2.png') }}"alt="">
                                <h4>Read More</h4>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <a href="#" class="action-bottom layout-1">
                                <img src="{{ asset('assets2/icons/small-icon-3.png') }}"alt="">
                                <h4>Contact Us</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section padding-tb-100px section-ba-1">
        <div class="container">
            <!-- Title -->
            <div class="section-title margin-bottom-40px">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="icon text-main-color"><i class="fa fa-truck"></i></div>
                        <div class="h2">Our Service</div>
                        <div class="des">Orbeva offers a comprehensive suite of tools for managing FERI certificates
                            and related logistics
                            documentation for all modes of transport </div>
                    </div>
                </div>
            </div>
            <!-- // End Title -->

            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="service-icon-box">
                        <div class="icon"><img src="{{ asset('assets2/icons/service-dark-1.png') }}"alt=""></div>
                        <a href="#" class="title h2">Road Freight</a>
                        <div class="des">Apply for and manage FERI certificates for road shipments. Upload required
                            documents,
                            track application status, and receive notifications on approvals</div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="service-icon-box">
                        <div class="icon"><img src="{{ asset('assets2/icons/service-dark-2.png') }}"alt=""></div>
                        <a href="#" class="title h2">Air Freight</a>
                        <div class="des">Coming soon: Digital FERI solutions for air cargo, ensuring compliance and
                            fast
                            turnaround for urgent shipments.</div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="service-icon-box">
                        <div class="icon"><img src="{{ asset('assets2/icons/service-dark-3.png') }}"alt=""></div>
                        <a href="#" class="title h2">Ocean Freight</a>
                        <div class="des">Coming soon: Full support for maritime FERI applications, including vessel
                            documentation
                            and port clearance integration.</div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="service-icon-box">
                        <div class="icon"><img src="{{ asset('assets2/icons/service-dark-4.png') }}"alt=""></div>
                        <a href="#" class="title h2">Rail Freight</a>
                        <div class="des">Coming soon: Streamlined FERI processing for rail cargo, with integration
                            to major
                            rail
                            operators in the region.</div>
                    </div>
                </div>
            </div>


            <div class="text-center">
                <a href="#" class="nile-bottom md">Show all <i class="fa fa-arrow-right"></i> </a>
            </div>

        </div>
    </div>


    <footer class="layout-dark">
        {{-- <div class="container padding-tb-100px">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="about-us sm-mb-45px">
                        <div class="logo-footer margin-bottom-35px">
                            <a href="#"><img src="{{ asset('assets2/img/logo-1.png') }}"alt=""></a>
                        </div>
                        <div class="text margin-bottom-35px">
                            Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        </div>
                        <a href="#" class="nile-bottom sm">Read More</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="nile-widget widget_nav_menu sm-mb-45px">
                        <h2 class="title">Our Services</h2>
                        <ul class="footer-menu">
                            <li><a href="#">Cargo Transportation </a></li>
                            <li><a href="#">Air Freight </a></li>
                            <li><a href="#">Ocean Freight </a></li>
                            <li><a href="#">Packaging & Storage </a></li>
                            <li><a href="#">Air Freight </a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="nile-widget widget_nav_menu sm-mb-45px">
                        <h2 class="title">Site Pages</h2>
                        <ul class="footer-menu">
                            <li><a href="#">Cargo Transportation </a></li>
                            <li><a href="#">Air Freight </a></li>
                            <li><a href="#">Ocean Freight </a></li>
                            <li><a href="#">Packaging & Storage </a></li>
                            <li><a href="#">Air Freight </a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="nile-widget">
                        <div class="margin-bottom-60px">
                            <h2 class="title">Location</h2>
                            <div class="contact-info opacity-9">
                                <div class="icon margin-top-5px"><span class="icon_pin_alt"></span></div>
                                <div class="text">
                                    <span class="title-in">Location :</span> <br>
                                    <span class="font-weight-500 text-uppercase">US - Los Angeles</span>
                                </div>
                            </div>
                        </div>
                        <div class="call_center">
                            <h2 class="title">Call Center</h2>
                            <div class="contact-info opacity-9">
                                <div class="icon  margin-top-5px"><span class="icon_phone"></span></div>
                                <div class="text">
                                    <span class="title-in">Call Us :</span><br>
                                    <span class="font-weight-500 text-uppercase">00222123333019</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> --}}
        <div class="copy-right">
            <div class="container padding-tb-50px">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copy-right-text text-lg-left text-center sm-mb-15px">
                            &copy; Orbeva {{ today()->format('Y') }},
                            <a href="{{ route('vendor.login') }}"
                                class="text-decoration-none bg-transparent border-0 p-0 m-0"
                                style="color: inherit; cursor: default; outline: none;">
                                Designed
                            </a> with <i class="fa fa-herat text-danger"></i> by <a target="_blank"
                                href="https://www.templateshub.net">Templates Hub</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!--  Social -->
                        <ul class="social-media list-inline text-lg-right text-center margin-0px text-white">
                            {{-- <li class="list-inline-item"><a class="facebook" href="#"><i
                                        class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li class="list-inline-item"><a class="youtube" href="#"><i
                                        class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            <li class="list-inline-item"><a class="linkedin" href="#"><i
                                        class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li class="list-inline-item"><a class="google" href="#"><i
                                        class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li class="list-inline-item"><a class="twitter" href="#"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a></li> --}}
                            <li class="list-inline-item"><a class="rss" href="#"><i class="fa fa-rss"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                        <!-- // Social -->
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- jquery library  -->
    <script src="{{ asset('assets2/js/nile-slider.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery-3.2.1.min.js') }}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('assets2/rslider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets2/rslider/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="{{ asset('assets2/rslider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('assets2/rslider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('assets2/rslider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('assets2/rslider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('assets2/rslider/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('assets2/rslider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('assets2/rslider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('assets2/rslider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('assets2/rslider/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('assets2/js/YouTubePopUp.jquery.js') }}"></script>
    <script src="{{ asset('assets2/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets2/js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('assets2/js/custom.js') }}"></script>
    <script src="{{ asset('assets2/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>

</body>


<!-- home-100:30-->

</html>
