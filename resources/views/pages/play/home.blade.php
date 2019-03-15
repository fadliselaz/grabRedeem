@extends('layouts.front')
@section('content')

<div class="ornmnt">
    <div class="top-left"></div>
    <div class="top-right"></div>
    <div class="bottom-left"></div>
    <div class="bottom-right"></div>
  </div>
  <div class="bag">
    <div class="bags top"></div>
    <div class="bags center"></div>
    <div class="bags bottom"></div>
    <!-- btm -->
    <div class="bags btm-top"></div>
    <div class="bags btm-btm"></div>
  </div>
  <div class="bag">
    <div class="bags r-top"></div>
    <div class="bags r-center"></div>
    <div class="bags r-bottom"></div>
    <!-- btm -->
    <div class="bags r-b-top"></div>
    <div class="bags r-b-center"></div>
  </div>

  <div class="grab-reward">
    <img width="300px"  src="{{ asset('assets-play/img/Grab-reward.png') }}" alt="grab-reward">
  </div>

  <div class="box-reward">
    <div class="box-rw">
      <div class="as">
        <h2 id="bold" class="sdw" >Grab</h2>
        <h2 class="sdw" >GREAT</h2>
        <h2 id="bold" class="sdw" >Rewards</h2>
      </div>
    </div>
  </div>
  <div class="qt-btm move-f">
    <h2 ><b id="bold" >KOTA KASABLANKA |</b> <span id="md">12 - 17 February 2019</span></h2>
  </div>
  <div class="qt-btm">
    <a style="display:inline-block;" href="{{ route('play.start') }}">
      <div class="txtbt">MULAI</div>
    </a>
  </div>
@stop
