@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div >
                <h2 id="hh"> {{ __('التحدي الخامس') }}</h2>
                <div  id="cc">
                    <img src="/img/5.png"  id="imgc1" >
                    
                    <div class="form-group row">
                        <div class="form-inline" id="seven">


                     <input id="ch2"  type="text" class="form-control" name="one" placeholder="1" required maxlength="1" size="1">
                     <input id="ch2"  type="text" class="form-control" name="two" placeholder="2" required maxlength="1" size="1">
                     <input id="ch2" type="text" class="form-control" name="three" placeholder="3" required maxlength="1"size="1">
                     <input id="ch2" type="text" class="form-control" name="four" placeholder="4" required maxlength="1" size="1">
                     <input id="ch2" type="text" class="form-control" name="five" placeholder="3" required maxlength="1" size="1">
                     <input id="ch2" type="text" class="form-control" name="sex" placeholder="4" required maxlength="1"  size="1">
                     <input id="ch2"  type="text" class="form-control" name="seven" placeholder="7" required maxlength="1" size="1">

                                    
                                      
                        </div>    
                   
                    </div>
                    <div class="form-group form-group-lg" >
                        <button id="send2"  type="submit" class="btn btn-success btn-lg " >
                            إرسال
                        </button>
                    </div>
                     
                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection