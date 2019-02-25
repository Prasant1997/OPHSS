<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
        {{--For form image display--}}
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    {{--For form image display--}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('sidebar/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sidebar/assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('sidebar/assets/scss/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
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


<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><h5>Routine Manager</h5></a>
            <a class="navbar-brand hidden" href="./"><h6>RM</h6></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="">
                    <a href="/home"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Time Table</h3><!-- /.menu-title -->
                <li class="">
                    <a href="/student_routine" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Routine</a>
                </li>
                {{--<li class="">--}}
                    {{--<a href="/add_student" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Student</a>--}}
                    {{--<ul class="sub-menu children dropdown-menu">--}}
                    {{--<li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>--}}
                    {{--<li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<h3 class="menu-title">Add Events</h3><!-- /.menu-title -->--}}
                <li class="">
                    <a href="/view_events" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Events</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <div class="form-inline">
                    </div>

                    <div class="dropdown for-notification">
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{asset('sidebar/images/admin.jpg')}}" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu" style="text-align: center;">
                        {{--<a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>--}}

                        {{--<a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>--}}

                        {{--<a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>--}}

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>
                            Logout

                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->

    <div class="content mt-3">
        @yield('content')

    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="{{ asset('sidebar/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{ asset('sidebar/assets/js/plugins.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/main.js') }}"></script>


<script src="{{ asset('sidebar/assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/widgets.js') }}"></script>


</body>
</html>
