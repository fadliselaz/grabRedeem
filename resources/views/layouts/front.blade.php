<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grab | Reward</title>
    <link rel="stylesheet" href="{{ asset('assets-play/css/style.css') }}">
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<div class="fluid {{ $class }}">

  @yield('content')

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

</div>
</body>
</html>