<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> تحدي ام القرى لليوم الوطني </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Styles 


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  --> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>
	
    <script>
      document.getElementsByTagName("html")[0].className += " js";
    </script>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <div id="app">
     
          
      <nav id="nav" class="navbar navbar-expand-md navbar-light   ">
          <div class="navbar-brand"  >
        <a href="{{ url('/king') }}">           <img src="/img/ksa.png"  id="imgna" >
        </a>
        <a  href="https://uqu.edu.sa/">       
            <img src="/img/uqu.png"  id="uqu" >
      </a>
        <a  href="https://twitter.com/dsauqu?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">       
              <img src="/img/01.png"  id="stu" >
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
                        <li class="nav-item">

                          <a class="nav-link" href="{{ url('/home') }}">الفائزون</a>  
                      </li>
                    @else
                        <div class="form-inline" id="dr">
                          
                        <li class="nav-item dropdown" >                           
                         
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
                             <a  class="nav-link" href="{{ url('challenge3') }}">التحدي الثالث</a>  
                                <br>
                                <a  class="nav-link" href="{{ url('challenge4') }}">التحدي الرابع</a>  
                                <br>
                                <a  class="nav-link" href="{{ url('challenge5') }}">التحدي الخامس</a>  
                                <br>
                                <a  class="nav-link" href="{{ url('challenge6') }}">التحدي السادس</a>  
                                <br>
                                <a  class="nav-link" href="{{ url('challenge7') }}">التحدي السابع</a> 

                                <br>
                                <a  class="nav-link" href="{{ url('challenge8') }}">التحدي الثامن</a>  
                                <br>
                                <a  class="nav-link" href="{{ url('challenge9') }}">التحدي التاسع</a> 
                                <br>
                                <a  class="nav-link" href="{{ url('challenge10') }}">التحدي العاشر</a> 
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
                                <a class="dropdown-item" href="{{ url('/') }}">عن المسابقة</a>  
                                <a class="dropdown-item" href="{{ url('/home') }}">الإحصائيات & الفائزون</a>  

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


    <section class="cd-h-timeline js-cd-h-timeline margin-bottom-md">
     

      <div class="cd-h-timeline__container container">
        <div class="cd-h-timeline__dates">
          <div class="cd-h-timeline__line">
            <ol>
              <li>
                <a
                  href="#0"
                  data-date="15/01/1875"
                  class="cd-h-timeline__date cd-h-timeline__date--selected"
                  >الملك عبد العزيز ال سعود</a
                >
              </li>
              <li>
                <a href="#0" data-date="15/01/1902" class="cd-h-timeline__date"
                  >الملك سعود بن عبد العزيز</a
                >
              </li>
              <li>
                <a href="#0" data-date="9/04/1906" class="cd-h-timeline__date"
                  >الملك فيصل بن عبد العزيز</a
                >
              </li>
              <li>
                <a href="#0" data-date="13/02/1913" class="cd-h-timeline__date"
                  >الملك خالد بن عبد العزيز</a
                >
              </li>
              <li>
                <a href="#0" data-date="16/03/1921" class="cd-h-timeline__date"
                  >الملك فهد بن عبد العزيز</a
                >
              </li>
              <li>
                <a href="#0" data-date="1/08/1924" class="cd-h-timeline__date"
                  >الملك عبد الله بن عبد العزيز</a
                >
              </li>
              <li>
                <a href="#0" data-date="31/12/1935" class="cd-h-timeline__date"
                  >الملك سلمان بن عبد العزيز</a
                >
              </li>
              <li>
                <a href="#0" data-date="31/08/1984" class="cd-h-timeline__date"
                  >الأمير محمد بن سلمان  </a
                >
              </li>


            </ol>

            <span class="cd-h-timeline__filling-line" aria-hidden="true"></span>
          </div>
          <!-- .cd-h-timeline__line -->
        </div>
        <!-- .cd-h-timeline__dates -->

        <ul>
          <li>
            <a
              href="#0"
              class="text-replace cd-h-timeline__navigation cd-h-timeline__navigation--prev cd-h-timeline__navigation--inactive"
              >Prev</a
            >
          </li>
          <li>
            <a
              href="#0"
              class="text-replace cd-h-timeline__navigation cd-h-timeline__navigation--next"
              >Next</a
            >
          </li>
        </ul>
      </div>
      <!-- .cd-h-timeline__container -->

      <div class="cd-h-timeline__events">
        <ol>
          <li
            class="cd-h-timeline__event cd-h-timeline__event--selected text-component"
          >
            <div class="cd-h-timeline__event-content container">
              <h4 id="kingh4">الملك عبد العزيز بن عبد الرحمن بن فيصل آل سعود-رحمه الله  </h4>
              <p id="kingp">الولادة : ذو الحجة 1292 هـ/يناير 1876م</p>
              <p id="kingp">الوفاة :الثاني من ربيع الأول 1373هـ الموافق التاسع من نوفمبر 1953 </p>

              <img src="/img/king-az.jpeg" id="king" >
            </div>
          </li>

          <li class="cd-h-timeline__event text-component">
            <div class="cd-h-timeline__event-content container">
              <h4 id="kingh4">الملك سعود بن عبد العزيز آل سعود -رحمه الله  </h4>
              <p id="kingp">الولادة :           3 شوال 1319هـ/15 يناير 1902
              </p>
              <p id="kingp">الوفاة :توفي في 6 ذي الحجة 1388هـ الموافق 1969م  </p>

              <img src="/img/king-so.jpeg" id="king" >
            </div>
          </li>

          <li class="cd-h-timeline__event text-component">
            <div class="cd-h-timeline__event-content container">
              <h4 id="kingh4">الملك فيصل بن عبد العزيز آل سعود -رحمه الله  </h4>
              <p id="kingp">الولادة :           14 صفر 1324 هـ / 9 أبريل 1906 م              </p>
              <p id="kingp">الوفاة : يوم الثلاثاء 12 ربيع الأول 1395 هـ الموافق 25 مارس 1975   </p>

              <img src="/img/king-fs.jpeg" id="king" >
            </div>
          </li>

          <li class="cd-h-timeline__event text-component">
            <div class="cd-h-timeline__event-content container">
              <h4 id="kingh4">الملك خالد بن عبد العزيز آل سعود -رحمه الله  </h4>
              <p id="kingp">الولادة :          6 ربيع الأول 1331 هـ / 13 فبراير 1913               </p>
              <p id="kingp">الوفاة : 21 شعبان 1402 هـ الموافق 13 يونيو 1982 م   </p>

              <img src="/img/king-kh.jpeg" id="king" >
            </div>
          </li>

          <li class="cd-h-timeline__event text-component">
            <div class="cd-h-timeline__event-content container">
              <h4 id="kingh4">الملك فهد بن عبد العزيز آل سعود -رحمه الله  </h2>
                <p id="kingp">الولادة :         11رجب 1339 الموافق / 16 مارس 1921                </p>
                <p id="kingp">الوفاة :1 أغسطس 2005 الموافق 26 جمادى الثانية 1426هـ    </p>

              <img src="/img/fh.jpeg" id="king" >
            </div>
          </li>

          <li class="cd-h-timeline__event text-component">
            <div class="cd-h-timeline__event-content container">
              <h4 id="kingh4">الملك عبد الله  بن عبد العزيز آل سعود -رحمه الله  </h4>
              <p id="kingp">الولادة :        1أغسطس 1924                </p>
              <p id="kingp">الوفاة :1 23 يناير 2015     </p>

              <img src="/img/ab.jpeg" id="king" >
            </div>
          </li>

          <li class="cd-h-timeline__event text-component">
            <div class="cd-h-timeline__event-content container">
              <h4 id="kingh4">الملك سلمان  بن عبد العزيز آل سعود -حفظه الله   </h4>
              <p id="kingp">الولادة :       5 شوال 1354 هـ / 31 ديسمبر 1935                 </p>

              <img src="/img/king-sm.jpeg" id="king" >
            </div>
          </li>

          <li class="cd-h-timeline__event text-component">
            <div class="cd-h-timeline__event-content container">
              <h4 id="kingh4"> الأمير محمد بن سلمان  بن عبد العزيز آل سعود -حفظه الله   </h4>
              <p id="kingp">الولادة :      15 ذو الحجة 1405 الموافق 31 أغسطس 1985                 </p>
              <img src="/img/mbs.jpeg" id="king" >

            </div>
          </li>

      
        </ol>
      </div>
      
      <!-- .cd-h-timeline__events -->
    </section>
    </div>
    <script src="js/util.js"></script>
    <!-- util functions included in the CodyHouse framework -->
    <script src="js/swipe-content.js"></script>
    <!-- A Vanilla JavaScript plugin to detect touch interactions -->
    <script src="js/main.js"></script>
  </body>
</html>
