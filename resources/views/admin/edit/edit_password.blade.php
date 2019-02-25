@extends('layouts.admin_sidebar')

@section('title', 'Update Password')
@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Update Password</strong>

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
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{route('reset', $students->id)}}"
                                  enctype="multipart/form-data">
                                {{--<input type="hidden" name="_method" value="PUT">--}}
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cc-payment" class="control-label mb-1">Full Name</label>
                                        <input id="" name="name" type="text" class="form-control"
                                              value="{{ $students->name }}" required>
                                    </div>
                                    <div class="form-group has-success col-md-6">
                                        <label for="cc-name" class="control-label mb-1">Student ID</label>
                                        <input id="email" type="textt" class="form-control" name="email"
                                               value="{{$students->email}}" required> <span
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
                                                Update
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div>
@endsection