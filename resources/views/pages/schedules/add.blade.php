<div class="panel panel-default">
    <div class="panel-heading">
        Scheduled Grand Prize
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="POST" action="{{ route('schedule_add') }}">
                    {!! csrf_field() !!}
                    <div class="form-group input-group">
                        <label>Select Prize</label>
                        <select  class="form-control" name="prize_id">
                            @foreach( $grand_prizes as $key => $prize)
                              <option value="{{ $prize->id }}">{{ $prize->name }} | {{ $prize->qtyRemains() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group input-group">
                        <label>Win at Play Order</label>
                        <input  class="form-control" type="number" name="play_order" required="true">
                    </div>
                    <a href="{{ route('schedules') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-default btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>  
</div>