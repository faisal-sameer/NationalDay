@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="natimg" >
<img src="/img/90.png" id="nat" data-toggle="modal" data-target="#exampleModal" >
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content center">
        <div class="modal-header">
          <br>
          <h3 class="modal-title" id="exampleModalLabel" >معلومات عن المنافسة</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      

            <img src="/img/about.jpeg" style="width: 100%">

           

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

@endsection
