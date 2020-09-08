@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><img src="/img/trophy.png" id="trophy" ></div>

                <div class="card-body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div  class="col-lg-9" id="homee1" >
                        <h3>الجائزة الكبرى</h3>
                    </div>    
                </div>
                <br>
                <div class="form-group">
                    <div  class="col-lg-9" id="win1" >
                        من منسوبي جامعة أم القرى
                    </div>
                    <div style="text-align: center">
                    <p>فيصل</p>
                    <p>عزو</p>
                    <p>ياسر</p>
                </div>

                </div>
                <div class="form-group">
                    <div  class="col-lg-9" id="win1" >
                        من خارج جامعة أم القرى
                    </div>
                    <div style="text-align: center">
                    <p>فيصل</p>
                    <p>عزو</p>
                    <p>ياسر</p>
                </div>

                </div>
                <hr>

                        <div class="row">
                            <div  class="col-lg-9" id="homee1" >
                            <h3  >التحدي الأول</h3>
                        </div>    
                    </div>
                    <br>
                    <div class="form-group">
                        <div  class="col-lg-9" id="win1" >
                            من منسوبي جامعة أم القرى
                        </div>
                        <div style="text-align: center">
                        <p>فيصل</p>
                        <p>عزو</p>
                        <p>ياسر</p>
                    </div>

                    </div>
                    <div class="form-group">
                        <div  class="col-lg-9" id="win1" >
                            من خارج جامعة أم القرى
                        </div>
                        <div style="text-align: center">
                        <p>فيصل</p>
                        <p>عزو</p>
                        <p>ياسر</p>
                    </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div  class="col-lg-9" id="homee1" >
                        <h3  >التحدي الثاني</h3>
                    </div>    
                </div>
                <br>
                <div class="form-group">
                    <div  class="col-lg-9" id="win1" >
                        من منسوبي جامعة أم القرى
                    </div>
                    <div style="text-align: center">
                    <p>فيصل</p>
                    <p>عزو</p>
                    <p>ياسر</p>
                </div>

                </div>
                <div class="form-group">
                    <div  class="col-lg-9" id="win1" >
                        من خارج جامعة أم القرى
                    </div>
                    <div style="text-align: center">
                    <p>فيصل</p>
                    <p>عزو</p>
                    <p>ياسر</p>
                </div>

                </div>
                <hr>

                <div class="row">
                    <div  class="col-lg-9" id="homee1" >
                    <h3  >التحدي الثالث</h3>
                </div>    
            </div>
            <br>
            <div class="form-group">
                <div  class="col-lg-9" id="win1" >
                    من منسوبي جامعة أم القرى
                </div>
                <div style="text-align: center">
                <p>فيصل</p>
                <p>عزو</p>
                <p>ياسر</p>
            </div>

            </div>

            <div class="form-group">
                <div  class="col-lg-9" id="win1" >
                    من خارج جامعة أم القرى
                </div>
                <div style="text-align: center">
                <p>فيصل</p>
                <p>عزو</p>
                <p>ياسر</p>
            </div>

            </div>
            <hr>

            <div class="row">
                <div  class="col-lg-9" id="homee1" >
                <h3  >التحدي الرابع</h3>
            </div>    
        </div>
        <br>
        <div class="form-group">
            <div  class="col-lg-9" id="win1" >
                من منسوبي جامعة أم القرى
            </div>
            <div style="text-align: center">
            <p>فيصل</p>
            <p>عزو</p>
            <p>ياسر</p>
        </div>

        </div>
        <div class="form-group">
            <div  class="col-lg-9" id="win1" >
                من خارج جامعة أم القرى
            </div>
            <div style="text-align: center">
            <p>فيصل</p>
            <p>عزو</p>
            <p>ياسر</p>
        </div>

        </div>
        <hr>
        <div class="row">
            <div  class="col-lg-9" id="homee1" >
            <h3  >التحدي الخامس</h3>
        </div>    
    </div>
    <br>
    <div class="form-group">
        <div  class="col-lg-9" id="win1" >
            من منسوبي جامعة أم القرى
        </div>
        <div style="text-align: center">
        <p>فيصل</p>
        <p>عزو</p>
        <p>ياسر</p>
    </div>

    </div>
    <div class="form-group">
        <div  class="col-lg-9" id="win1" >
            من خارج جامعة أم القرى
        </div>
        <div style="text-align: center">
        <p>فيصل</p>
        <p>عزو</p>
        <p>ياسر</p>
    </div>

    </div>
    <hr>

    <div class="row">
        <div  class="col-lg-9" id="homee1" >
        <h3  >التحدي السادس</h3>
    </div>    
</div>
<br>
<div class="form-group">
    <div  class="col-lg-9" id="win1" >
        من منسوبي جامعة أم القرى
    </div>
    <div style="text-align: center">
    <p>فيصل</p>
    <p>عزو</p>
    <p>ياسر</p>
</div>

</div>
<div class="form-group">
    <div  class="col-lg-9" id="win1" >
        من خارج جامعة أم القرى
    </div>
    <div style="text-align: center">
    <p>فيصل</p>
    <p>عزو</p>
    <p>ياسر</p>
</div>

</div>
<hr>
<div class="row">
    <div  class="col-lg-9" id="homee1" >
    <h3  >التحدي السابع</h3>
</div>    
</div>
<br>
<div class="form-group">
<div  class="col-lg-9" id="win1" >
    من منسوبي جامعة أم القرى
</div>
<div style="text-align: center">
<p>فيصل</p>
<p>عزو</p>
<p>ياسر</p>
</div>

</div>
<div class="form-group">
<div  class="col-lg-9" id="win1" >
    من خارج جامعة أم القرى
</div>
<div style="text-align: center">
<p>فيصل</p>
<p>عزو</p>
<p>ياسر</p>
</div>

</div>
<hr>
<div class="row">
    <div  class="col-lg-9" id="homee1" >
    <h3  >التحدي الثامن</h3>
</div>    
</div>
<br>
<div class="form-group">
<div  class="col-lg-9" id="win1" >
    من منسوبي جامعة أم القرى
</div>
<div style="text-align: center">
<p>فيصل</p>
<p>عزو</p>
<p>ياسر</p>
</div>

</div>
<div class="form-group">
<div  class="col-lg-9" id="win1" >
    من خارج جامعة أم القرى
</div>
<div style="text-align: center">
<p>فيصل</p>
<p>عزو</p>
<p>ياسر</p>
</div>

</div>
<hr>
<div class="row">
    <div  class="col-lg-9" id="homee1" >
    <h3  >التحدي التاسع</h3>
</div>    
</div>
<br>
<div class="form-group">
<div  class="col-lg-9" id="win1" >
    من منسوبي جامعة أم القرى
</div>
<div style="text-align: center">
<p>فيصل</p>
<p>عزو</p>
<p>ياسر</p>
</div>

</div>
<div class="form-group">
<div  class="col-lg-9" id="win1" >
    من خارج جامعة أم القرى
</div>
<div style="text-align: center">
<p>فيصل</p>
<p>عزو</p>
<p>ياسر</p>
</div>

</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
