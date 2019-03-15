<div class="panel panel-default">
    <div class="panel-heading">
        Edit Prize
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="POST" action="{{ route('prize_edit', ['id' => $prize->id]) }}">
                    {{ method_field('PUT') }}
                    {!! csrf_field() !!}
                    <div class="form-group input-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter text"  required="true" value="{{ $prize->name }}">
                    </div>
                    <div class="form-group input-group">
                        <label>Type</label>
                        <select  class="form-control" name="type">
                            @foreach( $types as $key => $value)
                                @if ($prize->type == $key)
                                    <option value="{{ $key }}" selected="true">{{ $value }}</option>
                                @else 
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group input-group">
                        <label>Qty</label>
                        <input  class="form-control" type="number" name="qty" required="true" value="{{ $prize->qty }}">
                    </div>
                    <a href="{{ route('prizes') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-default btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>  
</div>