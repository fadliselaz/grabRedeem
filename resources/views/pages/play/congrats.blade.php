@extends('layouts.front')
@section('content')

<div class="ornmnt">
    <div class="top-left"></div>
    <div class="top-right"></div>
    <div class="bottom-left"></div>
    <div class="bottom-right"></div>
  </div>
  <div class="bag">
    <div class="bg top"></div>
    <div class="bg center"></div>
    <div class="bg bottom"></div>
    <!-- btm -->
    <div class="bg btm-top"></div>
    <div class="bg btm-btm"></div>
  </div>
  <div class="bag">
    <div class="bg r-top"></div>
    <div class="bg r-center"></div>
    <div class="bg r-bottom"></div>
    <!-- btm -->
    <div class="bg r-b-top"></div>
    <div class="bg r-b-center"></div>
  </div>
  <div class="grab-reward p-b-g">
    <img width="300px"  src="{{ asset('assets-play/img/Grab-reward.png') }}" alt="grab-reward">
  </div>
  <div class="qt-btm show-up">
    <h2 id="big" ><b id="bold" >Congratulations!</b></h2>
  </div>
  <div class="qt-btm pdb">
    <a class="show-up" id="btn_next_action" style="display:inline-block;" href="{{ $next_action }}">
      <div class="txtbt">LANJUT</div>
    </a>
    <h2 class="sdw" style="font-size: 24px;">Tekan enter atau spasi untuk melanjutkan.</h2>
  </div>

  <script type="text/javascript">
    var redirectUrl = '{{ $next_action }}';
  </script>
  <script src="{{ asset('assets-play/js/keyupevent.js') }}"></script>

@stop