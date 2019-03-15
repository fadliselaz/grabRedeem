@extends('layouts.default')
@section('content')

<div class="row">
    <h3>Prizes</h3>
    @if ( Auth::user()->type == 1)
    <div class="col-lg-4">
    	@if (empty($prize)) 
        	@include('pages.prizes.add')
    	@else 
        	@include('pages.prizes.edit')
        @endif
    </div>
    @endif

    <div class="col-lg-8">
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Prizes
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
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Quantity</th>
                                        @if ( Auth::user()->type == 1)
                                        <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $prizes as $key => $prize)
	                                    <tr>
	                                        <td>{{ ($key + 1) }}</td>
	                                        <td>{{ $prize->name }}</td>
                                            @if ($prize->type == 1)
                                            <td style="color: #c3a60a; font-weight: bold;">{{ $prize->getTypeStringAttr() }}</td>
                                            @else 
                                            <td>{{ $prize->getTypeStringAttr() }}</td>
                                            @endif
                                            <td>{{ $prize->qtyRemains() .' of '. $prize->qty }}</td>
                                            @if ( Auth::user()->type == 1)
	                                        <td>
	                                        	<a href="{{ route('prize_detail', ['id' => $prize->id]) }}">Edit</a> | 
	                                        	<a href="#" data-href="{{ route('prize_delete', ['id' => $prize->id]) }}" data-item="{{ $prize->name }}" data-toggle="modal" data-target="#confirm-delete" style="color: red;">Delete</a>
	                                        </td>
                                            @endif
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
