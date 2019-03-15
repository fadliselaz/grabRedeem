<!doctype html>
<html>
<head>
    @include('includes.header')
</head>
<body>
<div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <!-- /.navbar-header -->
            @include('includes.navhead')

            <!-- /.navbar-static-side -->
            @include('includes.navside')

    </nav>  

    <div id="page-wrapper">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if ($errors->any())
                 @foreach ($errors->all() as $error)
                 <div class="alert alert-danger">
                  {{ $error }}
                </div>
                 @endforeach
             @endif

            @yield('content')

    </div>


</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p id="content"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok" id="btn_delete">Delete</a>
            </div>
        </div>
    </div>
</div>
    @include('includes.footer')

</body>
</html>