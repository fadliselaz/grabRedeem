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
  <div class="qt-btm">
    <h2 id="big" ><b id="bold" >Terima kasih!</b></h2>
    <h2 id="fz40" >Silakan ambil hadiah Anda di Redemption Counter</h2>
  </div>
  <div class="qt-btm pdb">
    <a style="display:inline-block;" id="btn_next_action" href="{{ route('play.home') }}">
      <div class="gld-btn">SELESAI</div>
    </a>
  </div>
  <script type="text/javascript">
    var redirectUrl = '{{ route("play.home") }}';
  </script>
  <script src="{{ asset('assets-play/js/keyupevent.js') }}"></script>

@stop