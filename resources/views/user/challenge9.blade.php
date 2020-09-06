@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div >
                <h2 id="hh">
                    <img src="img/infoo.png" data-toggle="modal" data-target="#exampleModal" id="info">{{ __('التحدي التاسع') }}
                    </h2>
                <div  id="cc">
                    <form method="POST" action="{{ route('answeNine') }}">
                        @csrf
                    <img src="img/9.png"  id="imgc1" >


                    
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

                                        
                        </div>    
                        <div class="form-group form-group-lg" >
                            <button id="send2"  type="submit" class="btn btn-success btn-lg " >
                                إرسال
                            </button>
                        </form>
                    </div>
                 

                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content center">
                        <div class="modal-header">
                          <br>
                          <h3 class="modal-title" id="exampleModalLabel" >معلومات عن التحدي التاسع</h3>
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
                                <label >الإجابة سوف تكون بالأحرف العربية من اليمين الى اليسار </label>
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