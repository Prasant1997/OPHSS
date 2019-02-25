@extends('layouts.admin_sidebar')

@section('title', 'Add Student')
@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Students Details</strong>
                            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal"
                                    data-target="#largeModal" style="float:right;">
                                Add Student

                            </button>

                            <div class="row>">
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
                                        <div class="alert alert-success"><span
                                                    class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($classes as $class)
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ $class->name }}</strong>

                            </div>
                            <div class="card-body table-responsive">
                                <table id="myTable-<?php echo $class->id ?>" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Class</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Parents</th>
                                        {{--<th>Description</th>--}}
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        @foreach($users as $user)
                                            @if($student->class_id == $class->id )

                                                @if($student->student_id == $user->id)
                                                    <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        @if(!$students->isEmpty())
                                                            <td>
                                                                <a href="{{ asset('images/student_profile/') }}/{{ $student->image }}"
                                                                   target="_blank"><img
                                                                            src="{{ asset('images/student_profile/') }}/{{ $student->image }}"
                                                                            width="50px"></a></td>
                                                            <td>{{ $student->classes->name }}</td>
                                                            <td>{{ $student->address }}</td>
                                                            <td>{{ $student->contact }}</td>
                                                            <td>Father: {{ $student->father }}<br>
                                                                Mother: {{ $student->mother }}</td>
                                                            {{--<td>{{ $student->Description }}</td>--}}
                                                            <td>
                                                                <a href="{{route('add_student.edit', $student->id)}}"
                                                                   class="">
                                                                    <button class="btn btn-secondary mb-1">
                                                                        <i class="fa  fa-edit (alias) fa-1x"></i>
                                                                    </button>
                                                                </a>
                                                                <a href="{{route('password', $user->id)}}"
                                                                   class="">
                                                                    <button class="btn btn-secondary mb-1">
                                                                        {{--<i class="fa  fa-edit (alias) fa-1x"></i>--}}
                                                                        Change password
                                                                    </button>
                                                                </a>
                                                            </td>
                                                        @endif
                                                        {{--@else--}}
                                                        {{--<td>???</td>--}}
                                                        {{--<td>???</td>--}}
                                                        {{--<td>???</td>--}}
                                                        {{--<td>???</td>--}}
                                                        {{--<td>???</td>--}}
                                                        {{--<td>???</td>--}}

                                                    </tr>
                                                @endif
                                            @endif

                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    @endforeach

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Students Detail</strong>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="mTable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Class</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Parents</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($unpros as $unpro)
                                    @if($unpro->type == 'student')
                                        <tr>

                                            <td>{{ $unpro->name }}</td>
                                            <td>{{ $unpro->email }}</td>
                                            <td>???</td>
                                            <td>???</td>
                                            <td>???</td>
                                            <td>???</td>
                                            <td>???</td>
                                            <td>???</td>

                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding:20px;">
                        <form class="form-horizontal" method="POST" action="{{route('add_student.store')}}"
                              enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="cc-payment" class="control-label mb-1">Full Name</label>
                                    <input id="" name="name" type="text" class="form-control"
                                           placeholder="Full Name" required>
                                </div>
                                <div class="form-group has-success col-md-6">
                                    <label for="cc-name" class="control-label mb-1">Student ID</label>
                                    <input id="email" type="textt" class="form-control" name="email"
                                           placeholder="Student ID" required> <span
                                            class="help-block field-validation-valid"
                                            data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password"
                                               class="control-label">Password</label>

                                        <input id="password" type="password" class="form-control"
                                               name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password-confirm" class="control-label">Confirm
                                            Password</label>
                                        <input id="password-confirm" type="password"
                                               class="form-control" name="password_confirmation"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div>

                                <div class="form-group">
                                    <input id="type" type="hidden"
                                           class="form-control" name="type" value="student"
                                           required>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection