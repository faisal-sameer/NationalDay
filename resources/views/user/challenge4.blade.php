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
                                <input   type="text"  name="one"  required maxlength="1" size="1">
                                <input   type="text"  name="two"  required maxlength="1" size="1">
                                <input type="text" name="three"  required maxlength="1"size="1">
                                  <input  type="text"  name="four"  required maxlength="1" size="1">
                                  <input  type="text"  name="five"  required maxlength="1" size="1">
                                </div>

                                <div id="group1"   class="col-md-4">
                                    <input  type="text"  name="six"  required maxlength="1"  size="1">
                                    <input   type="text" name="seven"  required maxlength="1" size="1">
                                    <input   type="text" name="eaght"  required maxlength="1" size="1">
                                    <input  type="text"  name="nine"  required maxlength="1"size="1">
                                    <input  type="text"  name="ten"  required maxlength="1" size="1">
                                    </div>
                                    <div id="group1"   class="col-md-3">
                                        <input  type="text"  name="eleven"  required maxlength="1" size="1">
                                        <input  type="text"  name="twelv"  required maxlength="1"  size="1">
                                        <input   type="text" name="therten"  required maxlength="1" size="1">

                                        </div>

                                    
                    </div>        
                </div>
                <div class="form-group form-group-lg" >
                    <button id="send2"  type="submit" class="btn btn-success btn-lg " >
                        إرسال
                    </button>
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
                  
                        <div class="form-group">
                          <label class="col-form-label">عدد المشاركين:{{$challengeinfo}} </label>

                          
                      </div>
                        <div class="form-group">
                          <label  class="col-form-label">عدد الإجابات الصحيحة :{{$challengeAnswer}} </label>
                         </div>
                         <div class="form-group">
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