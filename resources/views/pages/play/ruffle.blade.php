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

  <div class="grab-reward ">
     <div class="box-reward">
        <div class="box-rw">
        <div class="as">
            <h2 id="bold" class="sdw" >Grab</h2>
            <h2 class="sdw" >GREAT</h2>
            <h2 id="bold" class="sdw" >Rewards</h2>
        </div>
        </div>
    </div>
  </div>
  <div class="qt-btm">
    <div id="fire_decorate" style="display: none;">
      <div id="fire" ></div>
      <div id="fire1" ></div>
      <div id="fire2" ></div>
      <div id="fire3" ></div>
      <div id="firework1" ></div>
      <div id="firework2" ></div>
    </div>
    <div class="quote-brdr">
      <div class="quote" id="prize_gradient" style="min-width: 600px;">
        <h2><b id="bold"><span id="ruffle_text"></span></b></h2>
      </div>
    </div>
  </div>
  <div class="qt-btm">
    <h2 id="btn_start" class="sdw" >Tekan enter atau spasi untuk mulai.</h2>
    <a id="btn_next" style="display:none;" href="{{ route('play.draw' , $player->id) }}">
      <div class="txtbt">LANJUT</div>
    </a>
  </div>
  
  <script type="text/javascript">
    var ruffle = '{{ $current_draw }}';
    var drawUrl = '{{ app("Dingo\Api\Routing\UrlGenerator")->version("v1")->route("api.draw") }}';
    var congUrl = '{{ route("play.start") }}';

    var startSrc = '{{ URL::asset("/assets-play/sound/roll.wav") }}';
    var tadaSrc = '{{ URL::asset("/assets-play/sound/ding.wav") }}';
    var tadaGrandSrc = '{{ URL::asset("/assets-play/sound/tada.flac") }}';
    var redirectUrl = '{{ route("play.draw" , $player->id) }}';
  </script>
  <script src="{{ asset('assets-play/js/howler.core.js') }}"></script>
  <script src="{{ asset('assets-play/js/play.js') }}"></script>
@stop