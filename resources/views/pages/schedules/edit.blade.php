<div class="panel panel-default">
    <div class="panel-heading">
        Edit Schedule
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="POST" action="{{ route('schedule_edit', ['id' => $schedule->id]) }}">
                    {{ method_field('PUT') }}
                    {!! csrf_field() !!}
                    <div class="form-group input-group">
                        <label>Prize</label>
                        <select  class="form-control" name="prize_id">
                            <option value="{{ $schedule->prize_id }}" selected="true">{{ $schedule->prize->name }} | {{ $schedule->prize->qtyRemains() }}</option>
                            @foreach( $grand_prizes as $key => $prize)<!-- 
                                @if ($prize->id == $schedule->prize_id)
                                    <option value="{{ $prize->id }}" selected="true">{{ $prize->name }} | {{ $prize->qtyScheduleRemains() }}</option>
                                @else  -->
                                    <option value="{{ $prize->id }}">{{ $prize->name }} | {{ $prize->qtyRemains() }}</option>
                                <!-- @endif -->
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group input-group">
                        <label>Win at Play Order</label>
                        <input  class="form-control" type="number" name="play_order" required="true" value="{{ $schedule->play_order }}">
                    </div>
                    <a href="{{ route('schedules') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-default btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>  
</div>