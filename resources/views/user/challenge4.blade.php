@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-19">
            <div >
                <h2 id="hh"> {{ __('التحدي الرابع') }}</h2>
                    <form method="POST" action="{{ route('answerTwo') }}">
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
                                <input   type="text"  name="one" placeholder="1" required maxlength="1" size="1">
                                <input   type="text"  name="two" placeholder="2" required maxlength="1" size="1">
                                <input type="text" name="three" placeholder="3" required maxlength="1"size="1">
                                  <input  type="text"  name="four" placeholder="4" required maxlength="1" size="1">
                                  <input  type="text"  name="five" placeholder="5" required maxlength="1" size="1">
                                </div>

                                <div id="group1"   class="col-md-4">
                                    <input  type="text"  name="six" placeholder="6" required maxlength="1"  size="1">
                                    <input   type="text" name="seven" placeholder="7" required maxlength="1" size="1">
                                    <input   type="text" name="eaght" placeholder="8" required maxlength="1" size="1">
                                    <input  type="text"  name="nine" placeholder="9" required maxlength="1"size="1">
                                    <input  type="text"  name="ten" placeholder="10" required maxlength="1" size="1">
                                    </div>
                                    <div id="group1"   class="col-md-3">
                                        <input  type="text"  name="eleven" placeholder="11" required maxlength="1" size="1">
                                        <input  type="text"  name="twelv" placeholder="12" required maxlength="1"  size="1">
                                        <input   type="text" name="therten" placeholder="1" required maxlength="1" size="1">

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
           
        </div>
    </div>
</div>

               
@endsection