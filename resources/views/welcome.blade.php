
@extends('layouts.app')

@section('content')

  @include('sweetalert::alert')
  <div style="margin:3em;">
    <button type="button" class="btn btn-primary btn-lg " id="load1" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing Order">Submit Order</button>
    <br>
      <br>
    <button type="button" class="btn btn-primary btn-lg" id="load2" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">Submit Order</button>
    </div>
  <div id="cf">
    <div id="test" class="button"><p>   <img class="bottom" src="/king-ad.jpg" style="width: 50%" /> </p> </div>
    <div id="test" class="button"><p>   <img class="bottom" src="/king-fh.jpg" style="width: 50%" /> </p> </div>
    <div id="test" class="button"><p>   <img class="bottom" src="/king-kh.jpg" style="width: 50%" /> </p> </div>

  </div>
  <button type="button" onclick="opentheSwal();">OK</button>

@endsection
