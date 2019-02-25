@extends('layouts.admin_sidebar')

@section('title', 'Admin Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">

           <a href="{{ route('add_teacher.index') }}">
               <div class="col-sm-6 col-lg-3" style="text-align: center;">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{ count($staffs) }}</span>
                        </h4>
                        <p class="text-light">Staff</p>

                        <div class="chart-wrapper px-0" style="height:70px; text-align: center;" height="70">
                            {{--<canvas id="widgetChart1"></canvas>--}}<i class="fa fa-users fa-4x"></i>
                        </div>

                    </div>

                </div>
            </div>
           </a>
            <!--/.col-->

            <a href="{{ route('add_student.index') }}">
                <div class="col-sm-6 col-lg-3" style="text-align: center;">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{ count($students) }}</span>
                        </h4>
                        <p class="text-light">Students</p>

                        <div class="chart-wrapper px-0" style="height:70px; text-align: center;" height="70">
                            <i class="fa fa-graduation-cap fa-4x"></i>
                        </div>

                    </div>
                </div>
            </div>
            </a>
            <!--/.col-->

            <a href="{{ route('add_subject.index') }}">
                <div class="col-sm-6 col-lg-3" style="text-align: center;">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{ count($subjects) }}</span>
                        </h4>
                        <p class="text-light">Subjects</p>

                        <div class="chart-wrapper px-0" style="height:70px; text-align: center;" height="70">
                            <i class="fa fa-book fa-4x"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <!--/.col-->

            <a href="{{ route('add_class.index') }}">
                <div class="col-sm-6 col-lg-3" style="text-align: center;">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{ count($classes) }}</span>
                        </h4>
                        <p class="text-light">Classes</p>

                        <div class="chart-wrapper px-0" style="height:70px; text-align: center;" height="70">
                            <i class="fa fa-inbox fa-4x"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <!--/.col-->

            <div class="card-body">
                <div class="row">
                    {{--<div class="col-md-12">--}}
                    @if(!$events->isEmpty())
                    @foreach($events as $event)
                        <div class="column" style="text-align: center;">
                            <a href="{{ asset('images/events/') }}/{{ $event->image }}" target="_blank">
                                <img src="{{ asset('images/events/') }}/{{ $event->image }}" style="width:100%"></a>
                            <div style="background-color: white;">
                                <h3>{{ $event->event_name }}</h3>
                                <p>{{ $event->date }} <br> {{ $event->type }}</p>
                                <p>{{ $event->description }}</p>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <h3>{{ 'No Events are Created Yet ...' }}</h3>
                        @endif
                    {{--</div>--}}
                </div>
            </div>

        </div>
    </div>
</div>

{{--<script type="text/javascript"> <!----}}
    {{--var nc_width = 'responsive';--}}
    {{--var nc_height = 610;--}}
    {{--var nc_api_id = "061048i325"; //-->--}}
{{--</script>--}}
{{--<script type="text/javascript" src="https://www.ashesh.com.np/nepali-calendar/js/ncf.js"></script>--}}

@endsection
