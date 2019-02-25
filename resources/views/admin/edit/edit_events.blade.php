@extends('layouts.admin_sidebar')

@section('title', 'Edit Event')
@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><strong>Edit</strong>
                            <small> event</small>
                        </div>
                        <div class="card-body card-block">

                            <form class="form-horizontal" method="POST" action="{{route('add_event.update', $events->id)}}"
                                  enctype="multipart/form-data">

                                <input type="hidden" name="_method" value="PATCH">

                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{--<label for="cc-payment" class="control-label mb-1">Event Name</label>--}}
                                        {{--<input id="" name="event_name" type="text" class="form-control"--}}
                                        {{--placeholder="Event Name" required>--}}
                                        <img id="blah" src="#" alt="your image"/><br>
                                        <input type='file' name="image" onchange="readURL(this);" value="{{ $events->image }}" class="form-control"/>

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
                                    <div class="form-group col-md-6">
                                        <label for="cc-payment" class="control-label mb-1">Event Name</label>
                                        <input id="" name="event_name" type="text" class="form-control"
                                               value="{{ $events->event_name }}" required>
                                    </div>
                                    <div class="form-group has-success col-md-6">
                                        <label for="cc-name" class="control-label mb-1">Event Type</label>
                                        <input id="" type="text" class="form-control" name="type"
                                               value="{{ $events->type }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cc-payment" class="control-label mb-1">Date</label>
                                        <input id="" name="date" type="date" class="form-control"
                                               value="{{ $events->date }}" required>
                                    </div>
                                    <div class="form-group has-success col-md-6">
                                        <label for="cc-name" class="control-label mb-1">Remarks</label>
                                        <input id="" type="text" class="form-control" name="remarks"
                                               value="{{ $events->remarks }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group has-success col-md-12">
                                        <label for="cc-name" class="control-label mb-1">Description</label>
                                        <textarea id="" type="text" class="form-control" name="description"
                                                  value="" required>{{ $events->description }}</textarea>
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

    {{--<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"--}}
         {{--aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-lg" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="largeModalLabel">Add Class</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body" style="padding:20px;">--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection