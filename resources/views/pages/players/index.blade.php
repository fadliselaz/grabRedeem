@extends('layouts.default')
@section('content')

<div class="row">
    <h3>Players 
        <button class="btn btn-default btn-success" onclick="window.location.reload()">Refresh</button>
    </h3>
    <!-- <div class="col-lg-6"> -->
    	<!-- @if (empty($player)) 
            <div class="panel panel-default">
                <div class="panel-heading">
                    Select Player to Show
                </div>
            </div>
    	@else 
            @include('pages.players.edit')
        @endif -->
    <!-- </div> -->

    <style>

        .cntr-flx {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .align-cntr {
            display: flex !important; 
            align-items: center !important;
        }

        .align-cntr label {
            margin: 0px;
            margin-right: 10px;
        }

        #form-s {
            display: flex;
            align-items: center;
        }

        #form-s div {
            margin-right: 10px;
        }

    </style>

    <div class="col-lg-12">
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading cntr-flx">
                <p style="margin: 0px;" >Players</p>
                    <div id="form-s" >
                        <div>
                            <form method="get" action="{{route('players')}}">
                             {{csrf_field()}}
                             <div class="align-cntr" > 
                              <label style="white-space: nowrap;" for="search">Search by Name: </label>
                              <input type="text" name="search" value="{{ $search }}">
                             </div>
                            </form>
                        </div>
                        <div >
                            <form method="get" action="{{route('players')}}">
                             {{csrf_field()}}
                             <div class="align-cntr" >
                              <label style="white-space: nowrap;" for="searchPrize">Search by Prize: </label>
                              <input type="text" name="searchPrize" value="{{ $searchPrize }}">
                             </div>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('players' )}}" class="btn btn-default">Reset Search</a>
                        </div>
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
                                        <th>Draws</th>
                                        <th width="90px" align="content">Play Order</th>
                                        <th colspan="2">Prize</th>
                                        <th>Time</th>
                                        <th>Register</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $players as $key => $player)
	                                    <tr>
                                            <!-- <td>{{ ($key + 1) }}</td> -->
                                            <td>{{ $i = $key + 1 + ($players->perPage() * ($players->currentPage() - 1)) }}</td>
                                            <td>{{ $player->name }}</td>
                                            <td>{{ $player->draws }}</td>
                                            <td>
                            @foreach($player->drawslist as  $draw) 
                                    {{$draw->play_order}}<br>
                            @endforeach
                                            </td>
	                                        <td>
                            @foreach($player->drawslist as  $draw) 
                                @if($draw->prize != null && $draw->prize->type == 1) 
                                    <b style="color: #c3a60a; font-weight: bold;">{{ $draw->prize->name }}</b> 
                                    <br>
                                @elseif ($draw->prize != null)
                                    {{$draw->prize->name}}
                                    <br>
                                @else 
                                    -<br>
                                @endif
                            @endforeach
                                            </td>
                                            <td>
                           @foreach($player->drawslist as  $draw) 
                                @if ($draw->prize != null)
                                    <a href="#" data-href="{{ route('player_delete_draw' , $draw->id) }}" data-item="{{ $draw->prize->name }}" data-toggle="modal" data-target="#confirm-delete" style="color: red;text-align: right;" >Delete</a>
                                    <br>
                                @else 
                                    -<br>
                                @endif
                            @endforeach
                                            </td>
                                            <td>
                            @foreach($player->drawslist as  $draw) 
                                @if ($draw->prize != null)
                                    {{ $draw->updated_at->setTimezone('Asia/Jakarta')->format('H:i:s') }}<br>
                                @else 
                                    -<br>
                                @endif
                            @endforeach
                                            </td>
                                            <th>{{ $player->created_at->setTimezone('Asia/Jakarta') }}</th>
	                                        <td>
                                                @if($player->is_claim) 
                                                    <a href="#" class="btn btn-default" disabled>Claimed</a>
                                                @else
                                                    <a href="{{ route('player_claim' , $player->id) }}" class="btn btn-default btn-success" >Claim Prizes</a>
                                                @endif
	                                        	<!-- <a href="{{ route('player_detail', ['id' => $player->id]) }}">Show</a>  -->
                                                <!-- | 
	                                        	<a href="#" data-href="{{ route('player_delete', ['id' => $player->id]) }}" data-item="{{ $player->name }}" data-toggle="modal" data-target="#confirm-delete" style="color: red;">Delete</a> -->
	                                        </td>
	                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $players->links() }}
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

<script type="text/javascript">
    setTimeout(function () { 
      location.reload();
    }, 60 * 1000);
</script>

@stop
