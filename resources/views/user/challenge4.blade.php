@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-19">
            <div >
                <h2 id="hh">
                    <img src="img/infoo.png" data-toggle="modal" data-target="#exampleModal" id="info">{{ __('التحدي الرابع') }}</h2>
                    <form method="POST" action="{{ route('answerFour') }}">
                        @csrf
                        <div class="cr">
                            <img id="bg" src="img/bgpuzzle.jpg" >
                    <a id="textx" href="#" class="centered" onclick="scramble();return false">أبداء </a>
                   
                    
                    </div>
                   
                    <div id="puzzle_container">
                </div>
                    <div id="messageDiv"></div>
                    
                    <div id="cc">

                        <div class="row">
                            <div id="group1"  class="col-md-4">
                                <input   type="text"  name="one"   maxlength="1" size="1">
                                <input   type="text"  name="two"   maxlength="1" size="1">
                                <input type="text" name="three"   maxlength="1"size="1">
                                  <input  type="text"  name="four"   maxlength="1" size="1">
                                  <input  type="text"  name="five"   maxlength="1" size="1">
                                </div>

                                <div id="group1"   class="col-md-4">
                                    <input  type="text"  name="six"   maxlength="1"  size="1">
                                    <input   type="text" name="seven"   maxlength="1" size="1">
                                    <input   type="text" name="eaght"   maxlength="1" size="1">
                                    <input  type="text"  name="nine"   maxlength="1"size="1">
                                    <input  type="text"  name="ten"   maxlength="1" size="1">
                                    </div>
                                    <div id="group1"   class="col-md-3">
                                        <input  type="text"  name="eleven"   maxlength="1" size="1">
                                        <input  type="text"  name="twelv"   maxlength="1"  size="1">
                                        <input   type="text" name="therten"   maxlength="1" size="1">

                                        </div>

                                    
                    </div>        
                </div>
                <div class="form-group form-group-lg" >
                    <button id="send2"  type="submit" class="btn btn-success btn-lg " onclick="spinner()" >
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
                      <h3 class="modal-title" id="exampleModalLabel" >معلومات عن التحدي الرابع</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                  
                      <div class="form-group" id="lab">
                        <img src="/img/team.png" id="model" >
                        <br>
                        <label class="col-form-label">{{$challengeinfo}} </label>
                      </div>
                      <hr>
                      <div class="form-group" id="lab">
                        <img src="/img/correct.png" id="model" >
                        <br>
                            <label  class="col-form-label">{{$challengeAnswer}} </label>
                         </div>
                         <hr>
                         <div class="form-group" id="lab">
                          <img src="/img/description.png" id="model" >
                          <br>
                         <label >الإجابة سوف تكون بالأحرف العربية من اليمين الى اليسار </label>
                           </div>
                           

                       
            
                    </div>
                  </div>
                </div>
              </div>
          
           
        </div>
    </div>
</div>

               
@endsection