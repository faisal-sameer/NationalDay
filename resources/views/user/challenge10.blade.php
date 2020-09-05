@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div >
                <h2 id="hh"> {{ __('التحدي العاشر') }}</h2>
                <div  id="cc">
                    <form method="POST" action="{{ route('answerTwo') }}">
                        @csrf
                    <img src="img/10.png"  id="imgc1" >


                    
                        <div class="row">
                                <div id="group1"  class="col-md-4">
                                    <input   type="text"  name="one" placeholder="1" required maxlength="1" size="1">
                                    <input   type="text"  name="two" placeholder="2" required maxlength="1" size="1">
                                    <input type="text" name="three" placeholder="3" required maxlength="1"size="1">
                                      <input  type="text"  name="four" placeholder="4" required maxlength="1" size="1">
                                      
                                    </div>

                                    <div id="group1"   class="col-md-4">
                                        <input  type="text"  name="five" placeholder="5" required maxlength="1" size="1">
                                        <input  type="text"  name="six" placeholder="6" required maxlength="1"  size="1">
                                        <input   type="text" name="seven" placeholder="7" required maxlength="1" size="1">
                                        <input   type="text" name="eaght" placeholder="8" required maxlength="1" size="1">
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
</div>
@endsection