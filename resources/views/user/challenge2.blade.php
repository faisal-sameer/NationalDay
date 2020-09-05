@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div >
                <h2 id="hh"> {{ __('التحدي الثاني') }}</h2>
                <div  id="cc">
                    <form method="POST" action="{{ route('answerTwo') }}">
                        @csrf
                    <img src="/img/ra2.png"  id="imgc1" >


                    
                    <div class="row">

                            <div  class="col-md-2">
                            <input id="ch3text"  type="text" name="one" placeholder="1" required maxlength="1" size="1">
                            <input id="ch3text" type="text" name="two" placeholder="2" required maxlength="1" size="1">
                        </div>
                            <input id="ch3" type="text" class="form-control" name="three" placeholder="3" required maxlength="1"size="1">
                            <input id="ch3" type="text" class="form-control" name="four" placeholder="4" required maxlength="1" size="1">
                            <input id="ch3" type="text" class="form-control" name="five" placeholder="5" required maxlength="1" size="1">
                            <input id="ch3" type="text" class="form-control" name="six" placeholder="6" required maxlength="1"  size="1">
                       
                            <input id="ch3"  type="text" class="form-control" name="seven" placeholder="7" required maxlength="1" size="1">
                            <input id="ch3"  type="text" class="form-control" name="eaght" placeholder="8" required maxlength="1" size="1">
                            <input id="ch3" type="text" class="form-control" name="nine" placeholder="9" required maxlength="1"size="1">
                            <input id="ch3" type="text" class="form-control" name="ten" placeholder="10" required maxlength="1" size="1">
                            <input id="ch3" type="text" class="form-control" name="eleven" placeholder="11" required maxlength="1" size="1">
                            <input id="ch3" type="text" class="form-control" name="twelv" placeholder="12" required maxlength="1"  size="1">
                       
                            <input id="ch3"  type="text" class="form-control" name="therten" placeholder="1" required maxlength="1" size="1">
                            <input id="ch3"  type="text" class="form-control" name="fourten" placeholder="2" required maxlength="1" size="1">
                            <input id="ch3" type="text" class="form-control" name="fiften" placeholder="3" required maxlength="1"size="1">
                            <input id="ch3" type="text" class="form-control" name="sixten" placeholder="4" required maxlength="1" size="1">
                            <input id="ch3" type="text" class="form-control" name="seventen" placeholder="3" required maxlength="1" size="1">
                            <input id="ch3" type="text" class="form-control" name="eaghten" placeholder="4" required maxlength="1"  size="1">
                       
                            <input id="ch3"  type="text" class="form-control" name="ninten" placeholder="1" required maxlength="1" size="1">
                            <input id="ch3"  type="text" class="form-control" name="twenty" placeholder="2" required maxlength="1" size="1">
                            <input id="ch3" type="text" class="form-control" name="twentyone" placeholder="3" required maxlength="1"size="1">
                            <input id="ch3" type="text" class="form-control" name="twentytwo" placeholder="4" required maxlength="1" size="1">
                            <input id="ch3" type="text" class="form-control" name="twentythree" placeholder="3" required maxlength="1" size="1">
                            <input id="ch3" type="text" class="form-control" name="twentyfour" placeholder="4" required maxlength="1"  size="1">
                       
                                 



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
<script>    
    var sites = {!! json_encode($sites->toArray()) !!};
    console.log(sites)
</script>

@endsection