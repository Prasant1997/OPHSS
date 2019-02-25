@extends('layouts.admin_sidebar')

@section('title', 'Create Routine')
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Routine Details</strong>
                            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal" style="float:right;">
                                Add Routine
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
                                        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
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
                                    <th>S.No.</th>
                                    <th>Teacher Name</th>
                                    <th>Subject Name</th>
                                    <th>Class</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($routine as $routines)
                                    @if($routines->class_id == $class->id)
                                    <tr>
                                        <td>{{ $routines->id }}</td>
                                        <td>{{ $routines->users->name }}</td>
                                        <td>{{ $routines->subject->subject }}</td>
                                        <td>{{ $routines->classes->name }}</td>
                                        <td>{{ $routines->start_time }}</td>
                                        <td>{{ $routines->end_time }}</td>
                                        <td>{{ $routines->remarks }}</td>
                                        <td><span class="text-danger text-semibold"><i class="" aria-hidden="true"></i>
                                    <form class="" method="POST" action="{{ route('add_routine.destroy', $routines->id) }}">
                                    <input type="hidden" name="_token"
                                           value="{{csrf_token()}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="{{route('add_routine.edit', $routines->id)}}"
                                           class=""  ><i class="fa  fa-edit (alias) fa-1x"></i></a>
                                         <button type="submit" class="fa fa-trash-o fa-1x"
                                                 onclick="return confirm('Confirm to Delete');"
                                                 name="name " value="Delete" style="padding: 0; border: none; background: none;"></button>

                                </form>
                                </span></td>
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
    @endforeach

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
                    <form class="form-horizontal" method="POST" action="{{route('add_routine.store')}}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cc-payment" class="control-label mb-1">Teacher Name</label>
                                <select name="teacher_id" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cc-payment" class="control-label mb-1">Subject</label>
                                <select name="subject_id" class="form-control">
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{ $subject->subject }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group has-success col-md-4">
                                <label for="cc-name" class="control-label mb-1">Class</label>
                                <select name="class_id" class="form-control">
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cc-payment" class="control-label mb-1">Start Time</label>
                                <input id="" name="start_time" type="time" class="form-control"
                                       placeholder="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cc-payment" class="control-label mb-1">End Time</label>
                                <input id="" name="end_time" type="time" class="form-control"
                                       placeholder="" required>
                            </div>
                            <div class="form-group has-success col-md-4">
                                <label for="cc-name" class="control-label me" ">Remarks</label>
                                <input id="" type="text" class="form-control" name="remarks"
                                       placeholder="remarks" required>
                            </div>
                        </div>
                        <div>
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