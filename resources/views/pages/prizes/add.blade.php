<div class="panel panel-default">
    <div class="panel-heading">
        Add Prize
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="POST" action="{{ route('prize_add') }}">
                    {!! csrf_field() !!}
                    <div class="form-group input-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter text"  required="true">
                    </div>
                    <div class="form-group input-group">
                        <label>Type</label>
                        <select  class="form-control" name="type">
                            @foreach( $types as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group input-group">
                        <label>Qty</label>
                        <input  class="form-control" type="number" name="qty" required="true">
                    </div>
                    <a href="{{ route('prizes') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-default btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>  
</div>