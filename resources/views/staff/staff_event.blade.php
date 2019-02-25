@extends('layouts.staff_siderbar')

@section('title', 'View Events')
@section('content')

    <div class="container">
        <div class="card-header">
            <strong class="card-title">Events</strong>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
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
                    </div>
                    {{--</div>--}}
                </div>
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection
