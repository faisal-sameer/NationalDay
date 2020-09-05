@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div >               

                <h2 id="hh"> 
                 <img src="img/infoo.png" data-toggle="modal" data-target="#exampleModal" id="info">{{ __('التحدي الثاني') }}</h2>
                <div  id="cc">
                    <form method="POST" action="{{ route('answerTwo') }}">
                        @csrf
                    <img src="img/ra3_.png"  id="imgc1" >


                    
                        <div class="row">
                                <div id="group1"  class="col-md-2">
                                    
                            <input   type="text"  name="one"  required maxlength="1" size="2">
                            <input   type="text"  name="two"  required maxlength="1" size="2">
                            </div>

                            <div id="group1"   class="col-md-3">
                              <input type="text" name="three"  required maxlength="1"size="1">
                            <input  type="text"  name="four"  required maxlength="1" size="1">
                            <input  type="text"  name="five"  required maxlength="1" size="1">
                              </div>

                              <div id="group1" class="col-md-3">

                            <input  type="text"  name="six"  required maxlength="1"  size="1">
                            <input   type="text" name="seven"  required maxlength="1" size="1">
                            <input   type="text" name="eaght"  required maxlength="1" size="1">
                        </div>
                        <div id="group1" class="col-sm-4">
                              <input  type="text"  name="nine"  required maxlength="1"size="1">
                            <input  type="text"  name="ten" required maxlength="1" size="1">
                            <input  type="text"  name="eleven"  required maxlength="1" size="1">
                            <input  type="text"  name="twelv"  required maxlength="1"  size="1">
                        </div>
                    </div>
                    <div class="row">

                        <div id="group1"  class="col-sm-4">

                            <input   type="text" name="therten"  required maxlength="1" size="1">
                            <input   type="text" name="fourten"  required maxlength="1" size="1">
                            <input  type="text" name="fiften"  required maxlength="1"size="1">
                            <input  type="text" name="sixten"  required maxlength="1" size="1">
                        </div>
                        <div id="group1"  class="col-sm-4">

                            <input  type="text" name="seventen"  required maxlength="1" size="1">
                            <input  type="text" name="eaghten"  required maxlength="1"  size="1">
                            <input   type="text" name="ninten"  required maxlength="1" size="1">
                            <input   type="text" name="twenty"  required maxlength="1" size="1">
                        </div>
                        <div id="group1"  class="col-sm-4">

                            <input  type="text"  name="twentyone"  required maxlength="1"size="1">
                            <input  type="text"  name="twentytwo"  required maxlength="1" size="1">
                            <input  type="text"  name="twentythree"  required maxlength="1" size="1">
                            <input  type="text"  name="twentyfour"  required maxlength="1"  size="1">
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
                              <h3 class="modal-title" id="exampleModalLabel" >معلومات عن التحدي الثاني</h3>
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
                                    <label  class="col-form-label">الإجابة : </label>
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
</div>
<script>    
    var sites = {!! json_encode($sites->toArray()) !!};
    console.log(sites)
</script>

@endsection