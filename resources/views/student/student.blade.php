@extends('layouts.student_sidebar')

@section('title','Student Profile')
@section('content')

    {{--@php DD(empty($profile));--}}
            {{--@endphp--}}
@if  ( !$profile->isEmpty())
    @foreach($profile as $profile)
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{  $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                        @endif
                        {{--<div class="col-md-8 col-offset-2">--}}
                        <section class="card">
                            <div class="twt-feed blue-bg">
                                <div class="corner-ribon black-ribon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <div class="fa fa-twitter wtt-mark"></div>

                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:100px; height:100px;" alt="" src="{{ asset('images/student_profile/')}}/{{ $profile->image }}">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-white display-6">{{ Auth::user()->name }}</h2>
                                        <p class="text-light">Student ID : {{ Auth::user()->email }}</p>
                                    </div>
                                </div>



                            </div>
                            <div class="weather-category twt-category">
                                <ul>
                                    <li class="active">
                                        <h5>Class</h5>
                                        {{ $profile->classes->name }}
                                    </li>
                                    <li>
                                        <h5>Address</h5>
                                        {{$profile->address}}
                                    </li>
                                    <li>
                                        <h5>Contact</h5>
                                        {{ $profile->contact }}
                                    </li>
                                </ul>
                            </div>
                            <div class="twt-write col-sm-12" style="text-align: center;">
                                @if($profile->gender == 'male')
                                    {{'He is the son of Mr.'. $profile->father. ' and Mrs.' .$profile->mother}}<br>
                                    @else
                                    {{'He is the daughter of Mr.'. $profile->father. ' and Mrs.' .$profile->mother}}<br>
                                @endif
                                    {{$profile->Description }}
                            </div>
                            <footer class="twt-footer" style="text-align: right;">
                                <a href="{{route('student_profile.edit', $profile->id)}}"
                                   class="">
                                    <button class="btn btn-secondary mb-1">
                                        <i class="fa  fa-edit (alias) fa-1x"></i>
                                    </button>
                                </a>
                            </footer>
                        </section>
                        {{--</div>--}}
                    </div>
                </div>
            </div>

@endforeach
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{--<div class="col-md-8 col-offset-2">--}}
                    <section class="card">
                        <div class="twt-feed blue-bg">
                            <div class="corner-ribon black-ribon">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <div class="fa fa-twitter wtt-mark"></div>

                            <div class="media">
                                <a href="#">
                                    <img class="align-self-center rounded-circle mr-3" style="width:100px; height:100px;" alt="" src="{{asset('images/user1.png')}}">
                                </a>
                                <div class="media-body">
                                    <h2 class="text-white display-6">{{ Auth::user()->name }}</h2>
                                    <p class="text-light">Student ID : {{ Auth::user()->email }}</p>
                                </div>
                            </div>



                        </div>
                        <div class="weather-category twt-category">
                            <ul>
                                <li class="active">
                                    <h5>Class</h5>
                                    ???
                                </li>
                                <li>
                                    <h5>Address</h5>
                                    ???
                                </li>
                                <li>
                                    <h5>Contact</h5>
                                    ???
                                </li>
                            </ul>
                        </div>
                        <div class="twt-write col-sm-12" style="text-align: center;">
                            {{--<textarea placeholder="Write your Tweet and Enter" rows="1" class="form-control t-text-area"></textarea>--}}
                            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal">
                                Edit Profile
                            </button>
                        </div>
                        <footer class="twt-footer">
                        </footer>
                    </section>
                    {{--</div>--}}
                </div>
            </div>
        </div>
    @endif



    {{--//Student Detail Form Modal--}}
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Add Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding:20px;">
                    <form class="form-horizontal" method="POST" action="{{route('student_profile.store')}}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-12">
                                {{--<label for="cc-payment" class="control-label mb-1">Event Name</label>--}}
                                {{--<input id="" name="event_name" type="text" class="form-control"--}}
                                       {{--placeholder="Event Name" required>--}}
                                <img id="blah" src="#" alt="your image" /><br>
                                <input type='file' name="image" onchange="readURL(this);" class="form-control"/>

                                <script>
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#blah')
                                                    .attr('src', e.target.result)
                                                    .width(200)
                                                    .height(150);
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </div>
                            <div class="form-group has-success col-md-12">
                                <input id="" type="hidden" class="form-control" name="student_id"
                                       value="{{ Auth::user()->id }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="cc-name" class="control-label mb-1">Class</label>
                                <select name="class" class="form-control">
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cc-payment" class="control-label mb-1">Address</label>
                                <input id="" name="address" type="text" class="form-control"
                                       placeholder="Address" required>
                            </div>
                            <div class="form-group has-success col-md-3">
                                <label for="cc-name" class="control-label mb-1">Contact</label>
                                <input id="" type="text" class="form-control" name="contact"
                                       placeholder="Phone Number." required>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="cc-name" class="control-label mb-1">Gender</label>
                                <select name="gender" class="form-control">
                                    <option>male</option>
                                    <option>female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="cc-payment" class="control-label mb-1">Father Name</label>
                                <input type="text" name="father" class="form-control"
                                       placeholder="Father Name" required>
                            </div>
                            <div class="form-group has-success col-md-6">
                                <label for="cc-name" class="control-label mb-1">Mother Name</label>
                                <input id="" type="text" class="form-control" name="mother"
                                       placeholder="Mother Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group has-success col-md-12">
                                <label for="cc-name" class="control-label mb-1">Description</label>
                                <textarea id="" type="text" class="form-control" name="description"
                                          placeholder="Description" required></textarea>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
