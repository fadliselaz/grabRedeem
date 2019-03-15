<div class="panel panel-default">
    <div class="panel-heading">
        Add Player
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="POST" action="{{ route('player_add') }}">
                    {!! csrf_field() !!}
                    <div class="form-group input-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter text"  required="true">
                    </div>
                    <div class="form-group input-group">
                        <label>Draws</label>
                        <input  class="form-control" type="number" name="draws" required="true">
                    </div>
                    <a href="{{ route('players') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-default btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>  
</div>