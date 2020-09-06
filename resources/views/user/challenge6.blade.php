@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div >
                <h2 id="hh">
                    <img src="img/infoo.png" data-toggle="modal" data-target="#exampleModal" id="info">{{ __('التحدي السادس') }}
                </h2>
                <div  id="cc">
                    <form method="POST" action="{{ route('answerSix') }}">
                        @csrf
                    <img src="/img/6.png"  id="imgc1" >

                         
                    <div class="form-group row">
                        <div class="form-inline" id="one">


                     <input id="ch2"  type="text" class="form-control" name="one"  required maxlength="1" size="1">
                     <input id="ch2"  type="text" class="form-control" name="two"  required maxlength="1" size="1">
                     <input id="ch2" type="text" class="form-control" name="three"  required maxlength="1"size="1">
                     <input id="ch2" type="text" class="form-control" name="four"  required maxlength="1" size="1">
                     <input id="ch2" type="text" class="form-control" name="five"  required maxlength="1" size="1">
                    
                                      
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
                          <h3 class="modal-title" id="exampleModalLabel" >معلومات عن التحدي السادس</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                      
                            <div class="form-group">
                              <label class="col-form-label" id="lab">{{$challengeinfo}}:عدد المشاركين</label>

                              
                          </div>
                            <div class="form-group">
                              <label  class="col-form-label" id="lab">{{$challengeAnswer}}:عدد الإجابات الصحيحة </label>
                             </div>
                             <div class="form-group">
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