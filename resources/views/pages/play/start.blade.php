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
  <div class="grab-reward">
    <div class="box-reward hght-230">
        <div class="box-rw wdth-250">
        <div class="as">
            <h2 id="bold" class="sdw" >Grab</h2>
            <h2 class="sdw" >GREAT</h2>
            <h2 id="bold" class="sdw" >Rewards</h2>
        </div>
        </div>
    </div>
  </div>

  <div class="qt-btm">
    <form class="boxwidth draw" id="form1" method="POST" action="{{ route('play.new') }}">
        @csrf
        <div class="group-inpt">
            <label for="nama"><h2 id="bold">Nama</h2></label>
            <input type="text" name="name" autocomplete="off">
        </div>
        <div class="group-inpt">
            <!-- <label for="nama"><h2 id="bold">Jumlah Draw</h2></label> -->
            <input type="number" name="draws" max="1" value="1" style="display:none">
        </div>
    </form>
  </div>
  <div class="qt-btm">
    <button id="nobackground" type="submit" form="form1" >
      <div class="txtbt">LANJUT</div>
    </button>
  </div>

@stop
