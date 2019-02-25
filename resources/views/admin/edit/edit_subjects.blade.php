@extends('layouts.admin_sidebar')

@section('title', 'Edit Subjects')
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

                            <form class="form-horizontal" method="POST" action="{{route('add_subject.update', $subjects->id)}}" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PATCH">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cc-payment" class="control-label mb-1">Subject</label>
                                        <input id="" name="subject" type="text" class="form-control"
                                               value="{{ $subjects->subject }}" required>
                                    </div>
                                    <div class="form-group has-success col-md-6">
                                        <label for="cc-name" class="control-label mb-1">Remarks</label>
                                        <input id="" type="text" class="form-control" name="remarks"
                                               value="{{ $subjects->remarks }}" required>
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
    </div><!-- .animated -->
    </div><!-- .content -->
@endsection