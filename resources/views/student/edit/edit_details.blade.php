@extends('layouts.student_sidebar')

@section('title','Edit Student Details')
@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><strong>Edit</strong>
                            <small> Details</small>
                        </div>
                        <div class="card-body card-block">
                            <form class="form-horizontal" method="POST" action="{{route('student_profile.update', $students->id)}}" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PATCH">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{--<label for="cc-payment" class="control-label mb-1">Event Name</label>--}}
                                        {{--<input id="" name="event_name" type="text" class="form-control"--}}
                                        {{--placeholder="Event Name" required>--}}
                                        <img id="blah" src="#" alt="your image" /><br>
                                        <input type='file' name="image" onchange="readURL(this);" value="{{ $students->image }}" class="form-control"/>

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
                                            <option value="{{ $students->class_id }}">{{ $students->classes->name }}</option>
                                            @foreach($classes as $class)
                                                <option value="{{$class->id}}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="cc-payment" class="control-label mb-1">Address</label>
                                        <input id="" name="address" type="text" class="form-control"
                                               value="{{ $students->address }}" required>
                                    </div>
                                    <div class="form-group has-success col-md-3">
                                        <label for="cc-name" class="control-label mb-1">Contact</label>
                                        <input id="" type="text" class="form-control" name="contact"
                                               value="{{ $students->contact }}" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="cc-name" class="control-label mb-1">Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="{{ $students->gender }}" >{{ $students->contact }} </option>
                                            <option>male</option>
                                            <option>female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cc-payment" class="control-label mb-1">Father Name</label>
                                        <input type="text" name="father" class="form-control"
                                               value="{{ $students->father }}"  required>
                                    </div>
                                    <div class="form-group has-success col-md-6">
                                        <label for="cc-name" class="control-label mb-1">Mother Name</label>
                                        <input id="" type="text" class="form-control" name="mother"
                                               value="{{ $students->mother }}"  required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group has-success col-md-12">
                                        <label for="cc-name" class="control-label mb-1">Description</label>
                                        <textarea id="" type="text" class="form-control" name="description"
                                                  placeholder="Description" required>{{ $students->Description }} </textarea>
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


        </div>
    </div>
@endsection
