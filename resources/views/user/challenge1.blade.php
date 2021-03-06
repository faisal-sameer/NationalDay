@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div >
                <h2 id="hh"> 
                    <img src="img/infoo.png" data-toggle="modal" data-target="#exampleModal" id="info">{{ __('التحدي الأول') }}</h2>
                <div  id="cc">
                  <input type="image" src="img/change.png" id="info" />
                    <form method="POST" action="{{ route('answerOne') }}">
                        @csrf

                        <img src="/img/ra_1.png"  id="imgc1" >
                        <div class="form-group row">
                        

                        <div class="form-inline" id="one">
                            <input id="ch1"  type="text" class="form-control" name="one"  maxlength="1" size="1">
                            <input id="ch1"  type="text" class="form-control" name="two"  maxlength="1" size="1">
                            <input id="ch1" type="text" class="form-control" name="three"  maxlength="1" size="1">
                            <input id="ch1" type="text" class="form-control" name="four"  maxlength="1" size="1">
                            
                        </div>    
                   
                    </div>
                    <div class="form-group form-group-lg" >
                        <button id="send"  type="submit" class="btn btn-success btn-lg " onclick="spinner()">
                            إرسال
                        </button>
                        <div class="loader">
                          <div class="loading">
                          </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content center">
                        <div class="modal-header">
                          <br>
                          <h3 class="modal-title" id="exampleModalLabel"  >معلومات عن التحدي الأول</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                      
                            <div class="form-group" id="lab">
                              <img src="/img/team.png" id="model" >
                              <br>
                              <label class="col-form-label" >{{$challengeinfo}}</label>

                              
                          </div>
                          <hr>
                            <div class="form-group" id="lab">
                              <img src="/img/correct.png" id="model" >
                              <br>

                              <label  class="col-form-label" >{{$challengeAnswer}}</label>
                             </div>
                             <hr>
                             <div class="form-group" id="lab">
                               <img src="/img/description.png" id="model" >
                               <br>
                              <label >الإجابة سوف تكون بالأرقام الانجليزية من اليسار لليمين </label>
                            </div>
                               

                           
                
                        </div>
                      </div>
                    </div>
                  </div>
              
            </div>
        </div>
    </div>
</div>

@endsection