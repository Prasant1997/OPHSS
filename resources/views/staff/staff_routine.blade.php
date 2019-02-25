@extends('layouts.staff_siderbar')

@section('title', 'Staff Dashboard')
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Routine Details</strong>
                            <p type="" class="" style="float:right;">
                                <?php
                                $mytime = Carbon\Carbon::now();
                                echo $mytime->toDateString();
                                ?>
                                {{--<iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FKathmandu" width="100%" height="115" frameborder="0" seamless></iframe>--}}
                            </p>
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
                                    <th>Teacher Name</th>
                                    <th>Subject Name</th>
                                    <th>Class</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Remarks</th>
                                    {{--<th>Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=1 ?>
                                @foreach($routine as $routine)
                                    @if($routine->teacher_id == Auth::user()->id)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $routine->users->name }}</td>
                                            <td>{{ $routine->subject->subject }}</td>
                                            <td>{{ $routine->classes->name }}</td>
                                            <td>{{ $routine->start_time }}</td>
                                            <td>{{ $routine->end_time }}</td>
                                            <td>{{ $routine->remarks }}</td>
                                            {{--<td><span class="text-danger text-semibold"><i class="" aria-hidden="true"></i>--}}
                                            {{--<form class="" method="POST" action="{{ route('add_routine.destroy', $routine->id) }}">--}}
                                            {{--<input type="hidden" name="_token"--}}
                                            {{--value="{{csrf_token()}}">--}}
                                            {{--{{ csrf_field() }}--}}
                                            {{--{{ method_field('DELETE') }}--}}
                                            {{--<a href="{{route('add_routine.edit', $routine->id)}}"--}}
                                            {{--class=""  ><i class="fa  fa-edit (alias) fa-1x"></i></a>--}}
                                            {{--<button type="submit" class="fa fa-trash-o fa-1x"--}}
                                            {{--onclick="return confirm('Confirm to Delete');"--}}
                                            {{--name="name " value="Delete" style="padding: 0; border: none; background: none;"></button>--}}

                                            {{--</form>--}}
                                            {{--</span></td>--}}
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
@endsection
