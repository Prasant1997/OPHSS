@extends('layouts.admin_sidebar')

@section('title', 'Edit Classes')
@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><strong>Edit</strong>
                            <small> Class</small>
                        </div>
                        <div class="card-body card-block">

                            <form class="form-horizontal" method="POST"
                                  action="{{route('add_class.update',$classe->id)}}" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PATCH">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cc-payment" class="control-label mb-1">Class</label>
                                        <input id="" name="class" type="text" class="form-control"
                                               value="{{ $classe->name }}" required>
                                    </div>
                                    <div class="form-group has-success col-md-6">
                                        <label for="cc-name" class="control-label mb-1">Class Teacher</label>
                                        {{--<input id="" type="text" class="form-control" name="remarks"--}}
                                        {{--placeholder="remarks" required>--}}
                                        <select name="class_teacher" class="form-control">
                                            <option value="{{ $classe->class_teacher }}">{{ $classe->users->name }}</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success col-md-12">
                                    <label for="cc-name" class="control-label mb-1">Remarks</label>
                                    <input id="" type="text" class="form-control" name="remarks"
                                           value="{{ $classe->remarks }}" required>
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


        </div>
    </div><!-- .animated -->
    </div><!-- .content -->
@endsection