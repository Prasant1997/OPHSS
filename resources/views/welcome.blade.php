<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Oliver Public Higher Secondary School</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('welcome/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('welcome/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
          rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('welcome/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('welcome/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('welcome/lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('welcome/css/style.css') }}" rel="stylesheet">

    <style>
        .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            padding: 0 4px;
        }

        /* Create four equal columns that sits next to each other */
        .column {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
            max-width: 25%;
            padding: 0 4px;
        }

        .column img {
            margin-top: 8px;
            vertical-align: middle;
        }

        /* Responsive layout - makes a two column-layout instead of four columns */
        @media screen and (max-width: 800px) {
            .column {
                -ms-flex: 50%;
                flex: 50%;
                max-width: 50%;
            }
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                -ms-flex: 100%;
                flex: 100%;
                max-width: 100%;
            }
        }
    </style>

</head>

<body>

<!--==========================
Header
============================-->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <a href="/">
                <img src="{{asset('images/logo.png')}}" alt="" title="" height="70px" style="margin-top: -20px;"/>
            </a>
            <!-- Uncomment below if you prefer to use a text logo -->
            <!--<h1><a href="#hero">Regna</a></h1>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="#hero">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Events</a></li>
                <li><a href="#portfolio">Gallery</a></li>
                <li><a href="#contact">Contact Us</a></li>

                <li> @if (Route::has('login'))
                        @if (Auth::check())
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ url('/login') }}">Login</a>
                            {{--<a href="{{ url('/register') }}">Register</a>--}}
                        @endif
                    @endif </li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<!--==========================
  Hero Section
============================-->
<section id="hero">
    <div class="hero-container">
        <div style="">
            <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FKathmandu"
                    width="100%" height="115" frameborder="0" seamless></iframe>
        </div>
    </div>
</section><!-- #hero -->

<main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
        <div class="container">
            <div class="row about-container">

                <div class="col-lg-6 content order-lg-1 order-2">
                    <h2 class="title">Few Words About Us</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                    </p>

                    <div class="icon-box wow fadeInUp">
                        <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                        <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
                        <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                            tempore, cum soluta nobis est eligendi</p>
                    </div>

                    <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon"><i class="fa fa-photo"></i></div>
                        <h4 class="title"><a href="">Magni Dolores</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit anim id est laborum</p>
                    </div>

                    <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="icon"><i class="fa fa-bar-chart"></i></div>
                        <h4 class="title"><a href="">Dolor Sitema</a></h4>
                        <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat tarad limino ata</p>
                    </div>

                </div>

                <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
            </div>

        </div>
    </section><!-- #about -->

    <!--==========================
      Facts Section
    ============================-->
    <section id="facts">
        <div class="container wow fadeIn">
            <div class="section-header">
                <h3 class="section-title">Facts</h3>
                <p class="section-description"></p>
            </div>
            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">{{ count($staffs) }}</span>
                    <p>Teachers</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">{{ count($students) }}</span>
                    <p>Students</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">{{ count($classes) }}</span>
                    <p>Class</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">{{ count($subjects) }}</span>
                    <p>Subjects</p>
                </div>

            </div>

        </div>
    </section><!-- #facts -->

    <section id="services">
        <div class="container wow fadeIn">
            <div class="section-header">
                <h3 class="section-title">Events</h3>
                <p class="section-description"></p>
            </div>
            <div class="row">
                @if(!empty($events))
                    @foreach($events as $event)
                        <div class="column" style="text-align: center;">
                            <a href="{{ asset('images/events/') }}/{{ $event->image }}" target="_blank">
                                <img src="{{ asset('images/events/') }}/{{ $event->image }}" style="width:100%"></a>
                            <div style="background-color: #f7f7f7; padding: 5px;">
                                <h3>{{ $event->event_name }}</h3>
                                <p>{{ $event->date }} <br> {{ $event->type }}</p>
                                <p>{{ $event->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3>{{ 'No Events are Created Yet ...' }}</h3>
                @endif

            </div>

        </div>
    </section><!-- #services -->


    <section id="portfolio">
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h3 class="section-title">Gallery</h3>
                <p class="section-description"></p>
            </div>
            <div class="row">
                <div class="row" id="portfolio-wrapper">
                    <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                        <a href="{{ asset('images/pictures/1.jpg') }}" target="_blank">
                            <img src="{{ asset('images/pictures/1.jpg') }}" alt="" height="100%" width="100%">
                            <div class="details">
                                <h4>X-mas</h4>
                                <span>Celebrating X-mas 2017.</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                        <a href="{{ asset('images/pictures/2.jpg') }}" target="_blank">
                            <img src="{{ asset('images/pictures/2.jpg') }}" height="100%" width="100%" alt="">
                            <div class="details">
                                <h4>Social Work</h4>
                                <span>Agricultural education.</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                        <a href="{{ asset('images/pictures/3.jpg') }}" target="_blank">
                            <img src="{{ asset('images/pictures/3.jpg') }}" height="100%" width="100%" alt="">
                            <div class="details">
                                <h4>Discipline</h4>
                                <span>Assembly performance by students.</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                        <a href="{{ asset('images/pictures/4.jpg') }}" target="_blank">
                            <img src="{{ asset('images/pictures/4.jpg') }}" height="100%" width="100%" alt="">
                            <div class="details">
                                <h4>Entertainment</h4>
                                <span>Nagarkot Picnic 2017.</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- #portfolio -->

    <section id="contact">
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h3 class="section-title">Contact</h3>
                <p class="section-description"></p>
            </div>
        </div>

        <iframe src="http://maps.google.com/maps?q=27.738148, 85.344922&amp;z=15&amp;output=embed" width="100%" height="350" frameborder="0" style="border:0"></iframe>

        <div class="container wow fadeInUp">
            <div class="row justify-content-center" style="padding-top: 10px;">

                <div class="col-lg-3 col-md-4">

                    <div class="info">
                        <div>
                            <i class="fa fa-map-marker"></i>
                            <p>A108 Adam Street<br>New York, NY 535022</p>
                        </div>

                        <div>
                            <i class="fa fa-envelope"></i>
                            <p>info@example.com</p>
                        </div>

                        <div>
                            <i class="fa fa-phone"></i>
                            <p>+1 5589 55488 55s</p>
                        </div>
                    </div>

                    {{--<div class="social-links">--}}
                        {{--<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>--}}
                        {{--<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>--}}
                        {{--<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>--}}
                        {{--<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>--}}
                        {{--<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>--}}
                    {{--</div>--}}

                </div>

                <div class="col-lg-5 col-md-8">
                    <div class="form">
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="/" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                       data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Your Email" data-rule="email"
                                       data-msg="Please enter a valid email"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                       placeholder="Subject" data-rule="minlen:4"
                                       data-msg="Please enter at least 8 chars of subject"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                          data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #contact -->

</main>

<!--==========================
  Footer
============================-->
<footer id="footer">
    <div class="footer-top">
        <div class="container">

        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Regna</strong>. All Rights Reserved
        </div>
        <div class="credits">
            Bootstrap Templates by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="{{ asset('welcome/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('welcome/lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('welcome/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('welcome/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('welcome/lib/wow/wow.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

<script src="{{ asset('welcome/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('welcome/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('welcome/lib/superfish/hoverIntent.js') }}"></script>
<script src="{{ asset('welcome/lib/superfish/superfish.min.js') }}"></script>

<!-- Contact Form JavaScript File -->
<script src="{{ asset('welcome/contactform/contactform.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('welcome/js/main.js') }}"></script>

</body>
</html>
