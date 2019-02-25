@extends('layouts.admin_sidebar')

@section('title', 'Add Teacher')
@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Teachers Detail</strong>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal"
                                    data-target="#largeModal" style="float:right;">
                                Add Teacher
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
                        <div class="card-body table-responsive">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Parents</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><a href="{{ asset('images/staff_profile/') }}/{{ $user->image }}"
                                               target="_blank"><img
                                                        src="{{ asset('images/staff_profile/') }}/{{ $user->image }}"
                                                        width="50px"></a></td>
                                            <td>{{ $user->address }}</td>
                                            {{--@if($class->class_teacher == $user->id)--}}
                                                {{--<td>{{ $class->name }}</td>--}}
                                            {{--@else--}}
                                                <td>{{ $user->contact }}</td>
                                                <td>{{'Father: ' .$user->father }}<br>
                                                    {{'Mother: ' .$user->mother }}</td>
                                                <td>{{ $user->gender }}</td>
                                            {{--@endif--}}

                                        <td>
                                            <a href="{{route('add_teacher.edit', $user->sid)}}"
                                               class="">
                                                <button class="btn btn-secondary mb-1">
                                                    <i class="fa  fa-edit (alias) fa-1x"></i>
                                                </button>
                                            </a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Teachers Detail</strong>
                            <!-- Button trigger modal -->
                        </div>
                        <div class="card-body table-responsive">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Parents</th>
                                    <th>Gender</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($unpros as $unpro)
                                    @if($unpro->type == 'staff')
                                    <tr>
                                        <td>{{ $unpro->name }}</td>
                                        <td>{{ $unpro->email }}</td>
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


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Add Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding:20px;">
                    <form class="form-horizontal" method="POST" action="{{route('add_teacher.store')}}"
                          enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="cc-payment" class="control-label mb-1">Full Name</label>
                                <input id="" name="name" type="text" class="form-control"
                                       placeholder="Full Name" required>
                            </div>
                            <div class="form-group has-success col-md-6">
                                <label for="cc-name" class="control-label mb-1">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email"
                                       placeholder="Email Address" required> <span
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
                            <input id="type" type="hidden"
                                   class="form-control" name="type" value="staff"
                                   required>

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
@endsection