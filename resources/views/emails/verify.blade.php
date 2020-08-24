@extends('layouts.app')

@section('content')


<div class="container" style="direction: ltr">
    
    <div class="row">
      <div class="alert alert-success col-md-6" role="alert" id="notes">
        <h4>ملاحظة</h4>
        <ul>
          <li id="note">سوف تستقبل الكود فالإيميل بعد التسجيل ضع الكود في الأسفل</li>
        <li id="note">إذا لم تستقبل الكود في الإيميل يمكنك <a href="#">إعادة إرسال الكود</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10" id="code">
        <div class="jumbotron text-center">
          <h2>إكتب الكود</h2>
          <br>
          <form method="POST" action="{{ route('verify') }}">
            @csrf
             <div class="col-md-9 col-sm-12">
              <div class="form-group form-group-lg">
                <input type="text" class="form-control col-md-6 col-sm-6 col-sm-offset-2" id="ver" name="verifyCode" required>
                <br>
                <br>
                <input class="btn btn-primary btn-lg col-md-2 col-sm-2" id="vere" type="submit" value="تحقق">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
