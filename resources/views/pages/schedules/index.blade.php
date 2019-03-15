@extends('layouts.default')
@section('content')

<div class="row">
    <h3>Scheduled Grand Prizes</h3>
    <h4>Current Play Order : <b>{{ $play_order }}</b> 
        <button class="btn btn-default btn-success" onclick="window.location.reload()">Refresh</button>
    </h4>
    <div class="col-lg-6">
    	@if (empty($schedule)) 
        	@include('pages.schedules.add')
    	@else 
        	@include('pages.schedules.edit')
        @endif
    </div>

    <div class="col-lg-6">
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Schedules
                <div class="pull-right">
                    <div class="btn-group">
                        <!-- <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            Search
                            <span class="caret"></span>
                        </button> -->
                        <!-- <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Action</a>
                            </li>
                            <li><a href="#">Another action</a>
                            </li>
                            <li><a href="#">Something else here</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Prize Name</th>
                                        <th>Play Order</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $schedules as $key => $schedule)
	                                    <tr>
	                                        <td>{{ ($key + 1) }}</td>
                                            <td>{{ $schedule->prize->name }}</td>
	                                        <td>{{ $schedule->play_order }}</td>
	                                        <td>
	                                        	<a href="{{ route('schedule_detail', ['id' => $schedule->id]) }}">Edit</a> | 
	                                        	<a href="#" data-href="{{ route('schedule_delete', ['id' => $schedule->id]) }}" data-item="{{ 'schedule for prize '. $schedule->prize->name }}" data-toggle="modal" data-target="#confirm-delete" style="color: red;">Delete</a>
	                                        </td>
	                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>

@stop
