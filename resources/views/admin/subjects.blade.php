@extends('layouts.admin_sidebar')

@section('title', 'Add Subjects')
@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Subject Details</strong>
                            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal" style="float:right;">
                                Add Subject
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
                        <div class="card-body table-responsive">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Subject</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->id }}</td>
                                    <td>{{ $subject->subject }}</td>
                                    <td>{{ $subject->remarks }}</td>
                                    <td><span class="text-danger text-semibold"><i class="" aria-hidden="true"></i>
                                    <form class="" method="POST" action="{{ route('add_subject.destroy', $subject->id) }}">
                                    <input type="hidden" name="_token"
                                           value="{{csrf_token()}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="{{route('add_subject.edit', $subject->id)}}"
                                           class=""  ><i class="fa  fa-edit (alias) fa-1x"></i></a>
                                         <button type="submit" class="fa fa-trash-o fa-1x"
                                                 onclick="return confirm('Confirm to Delete');"
                                                 name="name " value="Delete" style="padding: 0; border: none; background: none;"></button>

                                </form>
                                </span></td>
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
                    <form class="form-horizontal" method="POST" action="{{route('add_subject.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="cc-payment" class="control-label mb-1">Subject</label>
                                <input id="" name="subject" type="text" class="form-control"
                                       placeholder="subject" required>
                            </div>
                            <div class="form-group has-success col-md-6">
                                <label for="cc-name" class="control-label mb-1">Remarks</label>
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