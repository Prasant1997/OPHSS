<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
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

    {{--<link href="{{ asset('sidebar/assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{asset('sidebar/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">


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
            <a class="navbar-brand" href="/"><h5>Routine Manager</h5></a>
            <a class="navbar-brand hidden" href="/"><h6>RM</h6></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="">
                    <a href="/home"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Add and Details</h3><!-- /.menu-title -->
                <li class="">
                    <a href="/add_teacher" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Staffs</a>
                </li>
                <li class="">
                    <a href="/add_student" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-graduation-cap"></i>Students</a>
                    {{--<ul class="sub-menu children dropdown-menu">--}}
                        {{--<li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>--}}
                        {{--<li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>--}}
                    {{--</ul>--}}
                </li>
                <li class="">
                    <a href="/add_class" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-inbox"></i>Classes</a>
                </li>

                <li class="">
                    <a href="/add_subject" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Subjects</a>
                </li>

                <h3 class="menu-title">Routine</h3><!-- /.menu-title -->
                <li class="">
                    <a href="/add_routine" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar"></i>Routine</a>
                </li>

                <h3 class="menu-title">Add Events</h3><!-- /.menu-title -->
                <li class="">
                    <a href="/add_event" class="" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Events</a>
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
                        <img class="user-avatar rounded-circle" src="{{asset('images/user.jpg')}}" alt="User Avatar">
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
{{--<script src="{{ asset('sidebar/assets/js/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('sidebar/assets/js/plugins.js') }}"></script>--}}
{{--<script src="{{ asset('sidebar/assets/js/main.js') }}"></script>--}}

<script src="{{ asset('sidebar/assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/lib/data-table/pdfmake.min.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('sidebar/') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        <?php
foreach($classes as $data){
    ?>
            $('#myTable-<?php echo $data->id ?>').DataTable();

        <?php
    }
    ?>
    } );
</script>
{{--<script type="text/javascript">--}}
    {{--$(document).ready(function() {--}}
        {{--$('#myTable-1').DataTable();--}}
    {{--} );--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
    {{--$(document).ready(function() {--}}
        {{--$('#myTable-2').DataTable();--}}
    {{--} );--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
    {{--$(document).ready(function() {--}}
        {{--$('#myTable-3').DataTable();--}}
    {{--} );--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
    {{--$(document).ready(function() {--}}
        {{--$('#myTable-5').DataTable();--}}
    {{--} );--}}
{{--</script>--}}

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    } );
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#mTable').DataTable();
    } );
</script>
<script src="{{ asset('sidebar/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{ asset('sidebar/assets/js/plugins.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/main.js') }}"></script>

<script src="{{ asset('sidebar/assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('sidebar/assets/js/widgets.js') }}"></script>
{{--<script src="{{ asset('sidebar/assets/js/lib/vector-map/jquery.vmap.js') }}"></script>--}}
{{--<script src="{{ asset('sidebar/assets/js/lib/vector-map/jquery.vmap.min.js') }}"></script>--}}
{{--<script src="{{ asset('sidebar/assets/js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>--}}
{{--<script src="{{ asset('sidebar/assets/js/lib/vector-map/country/jquery.vmap.world.js') }}"></script>--}}
{{--<script>--}}
    {{--( function ( $ ) {--}}
        {{--"use strict";--}}

        {{--jQuery( '#vmap' ).vectorMap( {--}}
            {{--map: 'world_en',--}}
            {{--backgroundColor: null,--}}
            {{--color: '#ffffff',--}}
            {{--hoverOpacity: 0.7,--}}
            {{--selectedColor: '#1de9b6',--}}
            {{--enableZoom: true,--}}
            {{--showTooltip: true,--}}
            {{--values: sample_data,--}}
            {{--scaleColors: [ '#1de9b6', '#03a9f5' ],--}}
            {{--normalizeFunction: 'polynomial'--}}
        {{--} );--}}
    {{--} )( jQuery );--}}
{{--</script>--}}

</body>
</html>
