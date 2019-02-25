@extends('layouts.admin_sidebar')

@section('title', 'Create Routine')
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Routine</strong>
                        </div>
                        <div class="card-body">

                            <div class="row>">
                                <form class="form-horizontal" method="POST"
                                      action="{{route('add_routine.update',$routine->id)}}"
                                      enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PATCH">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="cc-payment" class="control-label mb-1">Teacher Name</label>
                                            <select name="teacher_id" class="form-control">
                                                <option value="{{$routine->teacher_id}}">{{ $routine->users->name }}</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cc-payment" class="control-label mb-1">Subject</label>
                                            <select name="subject_id" class="form-control">
                                                <option value="{{$routine->subject_id}}">{{ $routine->subject->subject }}</option>
                                                @foreach($subjects as $subject)
                                                    <option value="{{$subject->id}}">{{ $subject->subject }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group has-success col-md-4">
                                            <label for="cc-name" class="control-label mb-1">Class</label>
                                            <select name="class_id" class="form-control">
                                                <option value="{{$routine->class_id}}">{{ $routine->classes->name }}</option>
                                                @foreach($classes as $class)
                                                    <option value="{{$class->id}}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="cc-payment" class="control-label mb-1">Start Time</label>
                                            <input id="" name="start_time" type="text" class="form-control"
                                                   value="{{$routine->start_time}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cc-payment" class="control-label mb-1">End Time</label>
                                            <input id="" name="end_time" type="text" class="form-control"
                                                   value="{{$routine->end_time}}" required>
                                        </div>
                                        <div class="form-group has-success col-md-4">
                                            <label for="cc-name" class="control-label mb-1">Remarks</label>
                                            <input id="" type="text" class="form-control" name="remarks"
                                                   value="{{$routine->remarks}}" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    update
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
        </div>
    </div>
    </div>
@endsection