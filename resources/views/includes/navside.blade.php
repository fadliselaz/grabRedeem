<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('prizes') }}"><i class="fa fa-gift fa-fw"></i> Prizes</a>
            </li>
            <li>
                <a href="{{ route('prizes_calc') }}"><i class="fa fa-gift fa-fw"></i> Prizes Transaction</a>
            </li>
            <li>
                <a href="{{ route('players') }}"><i class="fa fa-user fa-fw"></i> Players</a>
            </li>
            <!-- <li>
                <a href="{{ route('players') }}"><i class="fa fa-user fa-fw"></i> Players Claimed</a>
            </li> -->
            @if ( Auth::user()->type == 1)
            <li>
                <a href="{{ route('schedules') }}"><i class="fa fa-thumb-tack fa-fw"></i> Schedule</a>
            </li>
            @endif
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>