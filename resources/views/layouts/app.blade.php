<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> تحدي ام القرى لليوم الوطني </title>

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
    <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>
	
    <script type="text/javascript">
    /*
    (C) www.dhtmlgoodies.com, September 2005
    
    You are free to use this script as long as the copyright message is kept intact
    
    
    Alf Magne Kalleland
    
    */
      
    var puzzleImages = ['img/ch4.jpg'];	// Array of images to choose from
    var rows = 6;
    var cols = 6;
      
    var imageArray = new Array();
    var imageInUse = false;
    var puzzleContainer;
    var activeImageIndicator = false;
    var activeSquare = false; 	// Reference to active puzzle square
    var squareArray = new Array(); // Array with references to all the squares
  
    
    var emptySquare_x;
    var emptySquare_y;
    
    var colWidth;
    var rowHeight;
    
    var gameInProgress = false;
    
    var revealedImage = false;
    
    for(var no=0;no<puzzleImages.length;no++){
      imageArray[no] = new Image();
      imageArray[no].src = puzzleImages[no];	
    }
    
    function initPuzzle()
    {
      gameInProgress = false;
      var tmpInUse = imageInUse;
      imageInUse = imageArray[Math.floor(Math.random() * puzzleImages.length)];
      if(imageInUse==tmpInUse && puzzleImages.length>1)
        initPuzzle();
      else{
        puzzleContainer = document.getElementById('puzzle_container');
        $("#puzzle_container").hide();
  
        getImageWidth();
      }
    }
    
    function getImageWidth()
    {
      if(imageInUse.width>0){
        startPuzzle();	
      }else{
        setTimeout('getImageWidth()',100);	
      }
    }
    
    function scramble()
    {
      $("#puzzle_container").show();
      $("#bg").hide();
  
      gameInProgress = true;
      var currentRow = cols-1;
      var currentCol = rows-1;
      
      document.getElementById('revealedImage').style.display='none';
      
      for(var no=0;no<rows;no++){
        for(var no2=0;no2<cols;no2++){
          if(no<rows.length || no2<cols.length){
            var el = document.getElementById('square_' + no2 + '_' + no);
            if(el){
              el.style.left = (no2 * colWidth) + (no2) + 'px';
              el.style.top = (no * rowHeight) + (no) + 'px';	
            }else{
              initPuzzle();
              return;
            }
          }			
        }
      }		
      
      
      var lastPos=false;
      var countMoves = 0;
      while(countMoves<(50*cols*rows)){
        var dir = Math.floor(Math.random()*4);
        var readyToMove = false;
        if(dir==0 && currentRow>0 && lastPos!=1){	// Moving peice down
          currentRow = currentRow-1;	
          readyToMove = true;
        }				
        if(dir==1 && currentRow<(rows-1) && lastPos!=0){	// Moving peice up
          currentRow = currentRow+1;
          readyToMove = true;
        }	
        if(dir==2 && currentCol>0 && lastPos!=3){ 	// Moving peice right
          currentCol = currentCol -1;
          readyToMove = true;
        }	
        if(dir==3 && currentCol<(cols-1) && lastPos!=2){ 	// Moving peice right
          currentCol = currentCol + 1;
          readyToMove = true;
        }
        if(readyToMove){
          activeSquare = document.getElementById('square_' + currentCol + '_' + currentRow);
          moveImage(false,true);	
          lastPos = dir;
          countMoves++;
        }
      }
      
      return;
    }
    
    function gameFinished()
    {
      var string = "";
  
      var squareWidth = colWidth + 1;
      var squareHeight = rowHeight + 1;		
      var squareCounter = 0;
      var errorsFound = false;
      var correctSquares = 0;
      for(var prop in squareArray){
        var currentCol = squareCounter % cols; 
        var currentRow = Math.floor(squareCounter/cols);
        var correctLeft = currentCol * squareWidth;
        var correctTop = currentRow * squareHeight;
        if(squareArray[prop].style.left.replace('px','') != correctLeft || squareArray[prop].style.top.replace('px','') != correctTop){
          //return;			
        }else{
          correctSquares++;
        }
          
        squareCounter++;	
      }	
      
      if(correctSquares == ((cols * rows) -1)){
        document.getElementById('messageDiv').innerHTML = '<h2>أحسنت الان ما أسم هذا المكان ؟ !!</h2>';
        gameInProgress = false;
        revealImage();
        
      }else{
        document.getElementById('messageDiv').innerHTML = 'Currently, you have ' + correctSquares + ' out of ' + ((cols * rows) -1) + ' pieces placed correctly';
      }
      
    }
    
    var currentOpacity = 0;
    function revealImage()
    {
      if(currentOpacity==100)currentOpacity=0;
      var obj = document.getElementById('revealedImage');
      obj.style.display = 'block';
      currentOpacity = currentOpacity +2;
      if(document.all){
        obj.style.filter = 'alpha(opacity='+currentOpacity+')';
      }else{
        obj.style.opacity = currentOpacity/100;
      }
      
      if(currentOpacity<100)setTimeout('revealImage()',10);
      
    }
    function displayActiveImage()
    {
      if(!gameInProgress)return;
      if(!activeImageIndicator){
        activeImageIndicator = document.createElement('DIV');
        activeImageIndicator.className = 'activeImageIndicator';
        puzzleContainer.appendChild(activeImageIndicator);
        activeImageIndicator.onclick = moveImage;
        
      }
      activeImageIndicator.style.display='block';
      activeImageIndicator.style.left = this.offsetLeft +  'px';
      activeImageIndicator.style.top = this.offsetTop + 'px';
      activeImageIndicator.style.width = this.style.width;
      activeImageIndicator.style.height = this.style.height;
      activeImageIndicator.innerHTML = '<span></span>';
      activeSquare = this;
    }
    
    function moveImage(e,fromShuffleFunction)
    {
      if(!activeSquare)return;
      if(!gameInProgress && !fromShuffleFunction){
        alert('You have to shuffle the cards first');
        return;
      }
      var currentLeft = activeSquare.style.left.replace('px','') /1;
      var currentTop = activeSquare.style.top.replace('px','') /1;
      
      var diffLeft = Math.round((currentLeft - emptySquare_x) / colWidth);
      var diffTop = Math.round((currentTop - emptySquare_y) / rowHeight);	
      
      if(((diffLeft==-1 || diffLeft==1) && diffTop==0) || ((diffTop==-1 || diffTop==1) && diffLeft==0)){	// Moving right
        activeSquare.style.left = emptySquare_x + 'px';
        activeSquare.style.top = emptySquare_y + 'px';
        emptySquare_x = currentLeft;
        emptySquare_y = currentTop;	
        activeSquare = false;	
        if(activeImageIndicator)activeImageIndicator.style.display = 'none';
        if(!fromShuffleFunction)gameFinished();	
      }
    }
    
    function startPuzzle()
    {
      puzzleContainer.innerHTML = '';
  
  
      var subDivs = puzzleContainer.getElementsByTagName('DIV');
      for(var no=0;no<subDivs.length;no++){
        subDivs[no].parentNode.removeChild(subDivs[no]);
      }
      activeImageIndicator = false;
      squareArray.length = 0; 
  
      
      if(document.getElementById('revealedImage')){
        var obj = document.getElementById('revealedImage');
        obj.parentNode.removeChild(obj);
      }
      var revealedImage = document.createElement('DIV');
      revealedImage.style.display='none';
      revealedImage.id='revealedImage';;
      revealedImage.className='revealedImage';;
      var img = document.createElement('IMG');
      img.src = imageInUse.src;
      revealedImage.appendChild(img);
      puzzleContainer.appendChild(revealedImage);
        
      colWidth = Math.round(imageInUse.width / cols)-1;
      rowHeight = Math.round(imageInUse.height / rows)-1;
  
      puzzleContainer.style.width = colWidth * cols + (cols * 1) + 'px';
      puzzleContainer.style.height = rowHeight * rows + (rows * 1) + 'px';
      
      if(navigator.appVersion.indexOf('5.')>=0 && navigator.userAgent.indexOf('MSIE')>=0){
        puzzleContainer.style.width = colWidth * cols + (cols * 1) + 20 + 'px';
        puzzleContainer.style.height = rowHeight * rows + (rows * 1) + 20 + 'px';			
        
      }
          
      if(!revealedImage){
        revealedImage = document.createElement('DIV');
        revealedImage.style.display='none';	
        revealedImage.innerHTML = '';
        
      }
      for(var no=0;no<rows;no++){
        for(var no2=0;no2<cols;no2++){
          if(no2==cols-1 && no==rows-1){
            emptySquare_x = (no2 * colWidth) + (no2);	
            emptySquare_y = (no * rowHeight) + (no);	
            break;
          }
          var newDiv = document.createElement('DIV');
          newDiv.id = 'square_' + no2 + '_' + no;
          newDiv.onmouseover = displayActiveImage;
          newDiv.onclick = moveImage;
          newDiv.className = 'square';
          newDiv.style.width = colWidth + 'px';
          newDiv.style.height = rowHeight + 'px';	
          newDiv.style.left = (no2 * colWidth) + (no2) + 'px';
          newDiv.style.top = (no * rowHeight) + (no) + 'px';
          newDiv.setAttribute('initPosition',(no2 * colWidth) + (no2) + '_' + (no * rowHeight) + (no));
          var img = new Image();
          img.src = imageInUse.src;
          img.style.position = 'absolute';
          img.style.left = 0 - (no2 * colWidth) + 'px';
          img.style.top = 0 - (no * rowHeight) + 'px';
          newDiv.appendChild(img);				
          puzzleContainer.appendChild(newDiv);
          squareArray.push(newDiv);
        }
      }	
      
      
    }
    window.onload = initPuzzle;
    
    </script>
  

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" >
    @include('sweetalert::alert')

    <div id="app">
     
          
          <nav id="nav" class="navbar navbar-expand-md navbar-light   ">
              <div class="navbar-brand"  >
            <a href="{{ url('/king') }}">           <img src="/img/ksa.png"  id="imgna" >
            </a>
            <a  href="https://twitter.com/uqu_edu">       
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
        
<script type="text/javascript">
  function spinner() {
      document.getElementsByClassName("loader")[0].style.display = "block";
  }
  
</script>    

</body>

</html>

