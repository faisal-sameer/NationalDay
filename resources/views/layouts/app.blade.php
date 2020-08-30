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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            background-color: rgb(255, 255, 255);
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        

#imgna{
    width: 12%;
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
@media only screen and (max-width: 768px) {

    #imgna{
    width: 40%;
    margin-left: 30%
}

.nav-link {
    display: block;
    padding: 0.5rem 1rem;
    text-align: right;
    margin-right: 10%;
    margin-top: 5%;
}

}

    </style>

</head>
<body>
    @include('sweetalert::alert')

    <div id="app">
          
          <nav id="nav" class="navbar navbar-expand-md navbar-dark bg-dark ">
            <a class="navbar-brand" href="{{ url('/') }}">           <img src="/ksa.png"  id="imgna" >
            </a>

        

            

            
     
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
                        @else
                            <div class="form-inline" id="dr">
                            <li class="nav-item dropdown" id="dro">                           
                             
                                    <a id="navbarDropdown"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        @if ($user == null)

                                        <span class="dot2"><i class="far fa-bell"  id="bell"> </span></i>    التحديات
                                        @else 
                                       <i class="far fa-bell"  id="bell">التحديات  </i>

                                        @endif
                                </a>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   التحدي الأول

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @if (Auth::user()->check_email == 0)
                            <span class="dot"></span>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   {{ Auth::user()->user_name }} <span class="caret"></span> 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->check_email == 0)

                                    <a class="dropdown-item" href="/verify"
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
</body>
</html>
