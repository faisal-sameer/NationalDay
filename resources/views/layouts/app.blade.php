<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Styles 


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  --> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  
    
    <style>
     


#imgna{
    width:100%;
    margin-top: 15%;
}

#stu{
    width:70%;
}

#uqu{
    width:80%;
}
.dot {
  height: 12px;
  width: 15px;
  background-color: rgb(211, 4, 4);
  border-radius: 50%;
  display: inline-block;
}
.dot2{
    height: 12px;
  width: 15px;
  background-color: rgb(211, 4, 4);
  border-radius: 50%;
  display: inline-block;
}
#nav{
    color: #ebf0f1;
}

@media only screen and (max-width: 768px) {

    #imgna{
    width: 100%;

}

#stu{
    width: 70%;
    margin-left: 50%

}
#uqu{
    width: 100%;
    margin-left: 18%;
}

.nav-link {
    display: block;
    padding: 0.5rem 1rem;
    text-align: right;
    margin-right: 10%;
    margin-top: 5%;
}
.navbar-brand {
    display: inline-block;
    padding-top: 0.32rem;
    padding-bottom: 0.32rem;
    font-size: 1.125rem;
    line-height: inherit;
    white-space: nowrap;
    width: 27%;
    margin-left: 1%;
}



}

    </style>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" >
    @include('sweetalert::alert')

    <div id="app">
     
          
          <nav id="nav" class="navbar navbar-expand-md navbar-light   ">
              <div class="navbar-brand"  >
            <a href="{{ url('/king') }}">           <img src="/ksa.png"  id="imgna" >
            </a>
            <a  href="https://twitter.com/uqu_edu">       
                <img src="/uqu.png"  id="uqu" >
          </a>
            <a  href="https://twitter.com/dsauqu?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">       
                  <img src="/01.png"  id="stu" >
            </a>
           
        </div>


        

            

            
     
            <div class="container">
                   
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                      

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('سجل') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">

                                <a class="nav-link" href="{{ url('/') }}">عن المسابقة </a>  
                            </li>
                        @else
                            <div class="form-inline" id="dr">
                                <li class="nav-item">

                                    <a class="nav-link" href="{{ url('/') }}">عن المسابقة</a>  
                                </li>
                            <li class="nav-item dropdown" id="dro">                           
                             
                                    <a id="navbarDropdown"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        @if ($user == null)

                                        <span class="dot2"><i class="far fa-bell"  id="bell"> </span></i>    التحديات
                                        @else 
                                       <i class="far fa-bell"  id="bell">التحديات  </i>

                                        @endif
                                </a>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                 <a  class="nav-link" href="{{ url('challenge1') }}">التحدي الأول</a>  
                                 <br>
                                 <a  class="nav-link" href="{{ url('challenge2') }}">التحدي الثاني</a>  
                                 <br>
                                 <a  class="nav-link" href="{{ url('challenge7') }}">التحدي السابع</a>  

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @if (Auth::user()->check_email == 0)
                            <span class="dot"></span>
                            @endif

                            <li class="nav-item dropdown">
                                <a   id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   {{ Auth::user()->user_name }} <span class="caret"></span> 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->check_email == 0)

                                    <a  class="dropdown-item" href="/verify"
                                      >
                                       تفعيل الحساب <span class="dot"></span>  </a>

                                    @endif

                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </div>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>
   <main class="py-4">

            @yield('content')
            
        </main>  
    </div>
   
  
    <script >
        $(document).ready(function(){
          // Add smooth scrolling to all links in navbar + footer link
          $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
              // Prevent default anchor click behavior
              event.preventDefault();
        
              // Store hash
              var hash = this.hash;
        
              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top
              }, 1200, function(){
           
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
              });
            } // End if
          });
          
          $(window).scroll(function() {
            $(".slideanim").each(function(){
              var pos = $(this).offset().top;
        
              var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                  $(this).addClass("slide");
                }
            });
          });
        })
        </script>
</body>

</html>

