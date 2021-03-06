@extends('layouts.app')

@section('content')


<div class="container" id="verify">
    
    <div class="row">
      <div class="alert alert-success col-md-6" role="alert" id="notes">
        <h4>ملاحظة</h4>
        <ul>
          <li id="note">سوف تستقبل الكود فالإيميل بعد التسجيل ضع الكود في الأسفل</li>
          <form method="POST" action="{{ route('ResendCode') }}">
            @csrf
        <li id="note"><button type="submit" id="resend"class="btn">إعادة إرسال الكود</button>إذا لم تستقبل الكود في الإيميل يمكنك </li>

          </form>
        </ul>
      </div>
    </div>
    <div class="row-cols-sm-3 ">
      <div class="col-sm-8 " id="code" >
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
                <input class="btn btn-primary btn-lg " id="vere" type="submit" value="تحقق">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
