@extends('layouts.default')
@section('content')

<div class="row">
    <h3>Prizes</h3>

    <div class="col-lg-12">
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Prizes Transaction
                <div class="pull-right">
                    <form action="{{ route('prizes_calc') }}">
                      Date :
                      <input type="date" name="drawDate" value="{{ $drawDate }}">
                      <input type="submit" value="Filter">
                    </form>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        @if ($drawDate === null) 
                            <h4 style="color: red;">Select the Date</h4>
                        @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Claimed</th>
                                        <th>Unclaimed</th>
                                        <th>Total</th>
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
                                            <td>{{ $prize->claimed }}</td>
                                            <td>{{ $prize->unclaimed }}</td>
                                            <td>{{ $prize->total }}</td>
                                            <!-- <td>{{ $prize->qtyRemains() .' of '. $prize->qty }}</td> -->
	                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
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
