<div class="panel panel-default">
    <div class="panel-heading">
        Detail Player
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="POST" action="{{ route('player_edit', ['id' => $player->id]) }}">
                    {{ method_field('PUT') }}
                    {!! csrf_field() !!}
                    <div class="form-group input-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter text"  required="true" value="{{ $player->name }}" disabled="true">
                    </div>
                    <div class="form-group input-group">
                        <label>Draws</label>
                        <input  class="form-control" type="number" name="draws" required="true" value="{{ $player->draws }}" disabled="true">
                    </div>
                    <!-- <a href="{{ route('players') }}" class="btn btn-default">Cancel</a> -->
                    <!-- <button type="submit" class="btn btn-default btn-success">Save</button> -->
                </form>
            </div>
        </div>
    </div>  
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Draws
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Prize</th>
                                <th>Play Order</th>
                                <th>Updated at</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $player->drawslist as $key => $draw)
                                <tr>
                                    <td>{{ ($key + 1) }}</td>

                                    @if($draw->prize != null && $draw->prize->type == 1) 
                                    <td style="color: red;"><b>{{ $draw->prize->name }}</b></td>
                                    @else
                                    <td>{{ $draw->prize != null ? $draw->prize->name : "-" }}</td>
                                    @endif

                                    <td>{{ $draw->play_order }}</td>
                                    <th>{{ $draw->updated_at->setTimezone('Asia/Jakarta') }}</th>
                                    <td>
                                        {{ $draw->getStatusStringAttr() }}
                                       <!--  <a href="{{ route('player_detail', ['id' => $player->id]) }}">Show</a> | 
                                        <a href="#" data-href="{{ route('player_delete', ['id' => $player->id]) }}" data-item="{{ $player->name }}" data-toggle="modal" data-target="#confirm-delete" style="color: red;">Delete</a> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <a href="{{ route('player_claim' , $player->id) }}" class="btn btn-default btn-success">Claim All Prizes</a>
            </div>
        </div>
        <!-- /.row -->
    </div> 
</div>