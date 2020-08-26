<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style>
* {
  box-sizing: border-box;
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: auto;  
  margin-top: 5%;

}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* timecont around content */
.timecont {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.timecont::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -14px;
  background-color: white;
  border: 4px solid green;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the timecont to the left */
.left {
  left: 0;
}

/* Place the timecont to the right */
.right {
  left: 50%;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}
/* Add arrows to the left timecont (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right timecont (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for timeconts on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.contenttime {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
}
#imgna{
    width: 12%;
}
#nav{
    background-color: #636b6fb0;
}
#img{
    border-radius: 40%;
    width: 20%;
    float: left;

}
#imgleft{
    border-radius: 40%;
    width: 20%;
    float: right;
}
#pr{
    text-align: right;
    direction: rtl;
}
#pl{
    text-align: center;
    direction: rtl;
}
/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width timeconts */
  .timecont {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .timecont::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}
</style>
</head>
<body>
    @include('sweetalert::alert')

    <div id="app">

<video autoplay muted loop id="myVideo">
  <source src="ksa_Trim.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
<nav id="nav" class="navbar navbar-expand-md">
   
        
    <img src="/ksa.png"  id="imgna" >

  

  

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
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
             
              @endguest
          </ul>
      </div>
  </div>

</nav>
<div class="timeline">
  <div class="timecont right">
    <div class="contenttime">
   <img src="king-az.jpg" id="img" >
     <h4><b>الملك عبد العزيز بن عبد الرحمن بن فيصل آل سعود</b></h4>
        <p id="pr"><b>ولد :</b>  (ذو الحجة 1292 هـ/يناير 1876م) هو مؤسس المملكة العربية السعودية الحديثة وأول ملوكها، والحاكم الرابع عشر من أسرة آل سعود. ولد في الرياض لأسرة آل سعود الحاكمة في نجد.</p>
    <p id="pr"><b>حياته :</b> انطلق الملك عبد العزيز ورجاله، الذين بلغ عددهم ستين رجلاً، في ليلة 21 رمضان سنة 1319هـ الموافق 2 يناير 1902م، من الكويت قاصدين الرياض لاقتحام قصر المصمك، وهو مقر الحاكم.
        وبعد استعادة الرياض، وضع الملك عبد العزيز اللبنة الأولى في بناء الدولة، معلناً بداية مرحلة توحيد البلاد. وتعد مرحلة ما بعد استرداد الرياض، أهم المراحل في تاريخ عبد العزيز، إذ قضى أكثر من عشرين عاماً في معارك وحروب على أكثر من جبهة.
         </p>
         <p id="pr"><b>وفاته : </b>توفي الملك عبد العزيز بن عبد الرحمن آل سعود في قصره في محافظة الطائف المدينة التابعة لمنطقة مكة المكرمة في صباح يوم الإثنين الثاني من ربيع الأول 1373هـ الموافق التاسع من نوفمبر 1953 بنوبة قلبية بعد معاناته من مرض تصلب الشرايين، وتمت الصلاة عليه في الحوية ثم تم نقل جثمانه من مطار الطائف إلى مطار الرياض القديم، حيث دفن في مقبرة العود.</p>
    </div>
  </div>
  <div class="timecont left">
    <div class="contenttime">
        <img src="king-so.jpg" id="imgleft" >
        <h4><b>الملك سعود بن عبد العزيز بن عبد الرحمن آل سعود</b></h4>
        <p id="pl"><b>ولد :</b>  ولد في الكويت بتاريخ 3 شوال 1319هـ/15 يناير 1902 . </p>
        <p id="pl"><b>حياته :</b>
            ملك المملكة العربية السعودية الثاني والحاكم الخامس عشر من أسرة آل سعود. من 9 نوفمبر 1953 إلى 2 نوفمبر 1964. هو الابن الثاني من أبناء الملك عبد العزيز آل سعود الذكور من زوجته وضحى بنت محمد عريعر ، ولد في نفس السنة التي استعاد فيها والده الملك عبد العزيز آل سعود الرياض من آل رشيد.
        </p>
        <p id="pl"><b>وفاته : </b>
            غادر الملك سعود البلاد للعلاج في اليونان سنة 1385هـ الموافق 1965م؛ وتوفي في 6 ذي الحجة 1388هـ الموافق 1969م في أثينا عن عمر 67 سنة، ونقل جثمانه إلى مكة المكرمة حيث صلي عليه في المسجد الحرام ودفن بعدها في مقبرة العود في الرياض.
        </p>
    </div>
  </div>
  <div class="timecont right">
    <div class="contenttime">
        <img src="king-fs.png" id="img" >
        <h4><b>الملك  فيصل بن عبد العزيز بن عبد الرحمن  آل سعود</b></h4>
        <p id="pr"><b>ولد :</b> 14 صفر 1324 هـ / 9 أبريل 1906 م . </p>
        <p id="pl"><b>حياته :</b> ملك المملكة العربية السعودية الثالث والحاكم السادس عشر من أسرة آل سعود والابن الثالث من أبناء الملك عبد العزيز الذكور من زوجته الأميرة طرفة بنت عبد الله بن عبد اللطيف ابن الشيخ عبد الرحمن ابن الشيخ حسن آل الشيخ حفيد إمام الدعوة الشيخ محمد بن عبد الوهاب، وقد توفيت بعد خمسة أشهر من ولادته . تولى مقاليد الحكم في 27 جمادى الآخرة عام 1384هـ الموافق 2 نوفمبر 1964م.</p>
        <p id="pl"><b>وفاته : </b> قتل الملك فيصل بعد أن أطلق الأمير فيصل بن مساعد النار عليه وهو يستقبل وزير النفط الكويتي عبد المطلب الكاظمي في مكتبه بالديوان الملكي يوم الثلاثاء 12 ربيع الأول 1395 هـ الموافق 25 مارس 1975 عن عمر ناهز 69 عام.
        </p>
    </div>
  </div>
  <div class="timecont left">
    <div class="contenttime">
        <img src="king-kh.jpg" id="imgleft" >
        <h4><b>الملك خالد بن عبد العزيز بن عبد الرحمن آل سعود</b></h4>
        <p id="pl"><b>ولد :</b>6 ربيع الأول 1331 هـ / 13 فبراير 1913 .</p>
        <p id="pl"><b>حياته :</b>
            وُلِد الملك خالد خلال الأيام التي كان والده مشغولاً باسترداد الأحساء من الأتراك، وقد استبشر بمولد ابنه خيرًا وأسماه خالدًا ، ملك المملكة العربية السعودية الرابع من 25 مارس 1975 - 13 يونيو 1982. هو الابن الرابع من أبناء الملك عبد العزيز الذكور من الأميرة الجوهرة بنت مساعد بن جلوي بن تركي آل سعود والتي تعدّ أولى زوجات الملك عبد العزيز من آل سعود.        </p>
        <p id="pl"><b>وفاته : </b>
            توفي الملك خالد في صباح يوم الأحد 21 شعبان 1402 هـ الموافق 13 يونيو 1982 م، بمدينة الطائف عن عمر 69 سنة، ودفن في مقبرة العود بالرياض.        </p>
        </div>
  </div>
  <div class="timecont right">
    <div class="contenttime">
        <img src="king-fh.jpg" id="img" >
      <h4><b>الملك  فهد بن عبد العزيز بن عبد الرحمن  آل سعود</b></h4>
      <p id="pr"><b>ولد :</b> 11 رجب 1339 هـ /16 مارس 1921</p>
      <p id="pl"><b>حياته :</b> خامس ملوك المملكة العربية السعودية وأولهم اتخاذاً للقب خادم الحرمين الشريفين. هو الابن التاسع من أبناء الملك عبد العزيز الذكور، من زوجته الأميرة حصة بنت أحمد السديري. تولى مقاليد الحكم في 21 شعبان 1402 هـ الموافق 13 يونيو 1982م بعد وفاة أخيه غير الشقيق الملك خالد. أصيب بجلطة في نوفمبر 1995، ومنذ عام 1997 تولى عبد الله بن عبد العزيز ولي العهد حينها إدارة معظم شؤون البلاد اليومية.
        شهدت فترة حكمه الكثير من الأحداث أبرزها أزمة احتلال العراق لدولة الكويت في عام 1990، وتهديد العراق بغزو الأراضي السعودية، وكذلك الحرب العراقية - الإيرانية وما تبعها من أحداث تأثرت بها السعودية، وكذلك أحداث 11 سبتمبر 2001 في الولايات المتحدة وما تبعها من غزو الولايات المتحدة لأفغانستان والعراق، وأيضًا انخفاض أسعار النفط سنوات طويلة واضطرار الميزانية السعودية للانخفاض الشديد.
         </p>
      <p id="pl"><b>وفاته : </b>
        في 27 مايو 2005 أدخل لمستشفى الملك فيصل التخصصي بالرياض لإجراء فحوصات طبية دون تحديد نوعها. في يوم الاثنين 1 أغسطس 2005 الموافق 26 جمادى الثانية 1426هـ  وعند حوالي الساعة 2:30 بعد منتصف الليل توفي الملك فهد في نفس المستشفى، وصلي عليه يوم الثلاثاء بعد صلاة العصر بجامع الإمام تركي بن عبد الله بوسط الرياض، ودفن في مقبرة العود، وتولى أخوه عبد الله بن عبد العزيز آل سعود الحكم خلفًا له.
        
      </p>    </div>
  </div>
  <div class="timecont left">
    <div class="contenttime">
        <img src="king-ad.jpg" id="imgleft" >
        <h4><b>الملك  عبد الله  بن عبد العزيز بن عبد الرحمن  آل سعود</b></h4>
        <p id="pl"><b>ولد :</b>
            1 محرم 1343 هـ / 1 أغسطس  1924 م
        </p>
        <p id="pl"><b>حياته :</b>
            
 الملك السادس للمملكة العربية السعودية ويلقب بخادم الحرمين الشريفين وهو ذات اللقب الذي اتخذه الملك فهد قبله، هو الابن الثاني عشر من أبناء الملك عبد العزيز الذكور، وأمه هي فهدة بنت العاصي بن كليب بن شريم العبدي الشمري ولد في عام 1924م بمدينة الرياض. في عام 1995م استلم إدارة شؤون الدولة وأصبح الملك الفعلي بعد إصابة الملك فهد بجلطات ومتاعب صحية عدة، وبعد وفاة الملك فهد في 1 أغسطس 2005م تولى الحكم، وبالإضافة لكونه ملكا للدولة فقد كان يشغل منصب رئيس مجلس الوزراء تبعا لأحكام نظام الحكم في المملكة القاضية بأن يكون الملك رئيسًا للوزراء.

        </p>
        <p id="pl"><b>وفاته : </b>
            أعلن الديوان الملكي السعودي وفاة الملك عبد الله بن عبد العزيز آل سعود ببيان رسمي في 23 يناير 2015 عن عمر ناهز 91 عاما. ووري الثرى في مقبرة العود بعد ان صلي عليه في جامع الإمام تركي بن عبد الله عقب صلاة العصر من يوم الجمعة 3 ربيع الثاني 1436 هـ الموافق 23 يناير 2015. وقد خلفه في حكم المملكة أخاه ولي العهد سلمان بن عبد العزيز آل سعود.
        </p>

    </div>
  </div>
  <div class="timecont right">
    <div class="contenttime">
        <img src="king-sl.jpg" id="img" >
      <h4><b>الملك  سلمان  بن عبد العزيز بن عبد الرحمن  آل سعود</b></h4>
      <p id="pr"><b>ولد :</b>5 شوال 1354 هـ / 31 ديسمبر 1935 . </p>
      <p id="pl"><b>حياته :</b>
        هو ملك المملكة العربية السعودية السابع،  ورئيس مجلس الوزراء والقائد الأعلى لكافة القوات العسكرية،  الحاكم العشرون من أسرة آل سعود والابن الخامس والعشرون من أبناء الملك المؤسس عبد العزيز بن عبد الرحمن آل سعود من زوجته الأميرة حصة بنت أحمد السديري. وهو أحد أهم أركان العائلة المالكة السعودية، بصفته أمين سر العائلة ورئيس مجلسها، والمستشار الشخصي لملوك المملكة، كما أنه أحد من يطلق عليهم السديريون السبعة من أبناء الملك عبد العزيز ،


        تمت مبايعة خادم الحرمين الشريفين الملك سلمان بن عبد العزيز، ملكاً للمملكة العربية السعودية، في 3 ربيع الثاني 1436 هـ الموافق 23 يناير 2015م بعد وفاة الملك عبد الله بن عبد العزيز آل سعود.
            </p>
      <p id="pl"><b>حفظه الله  </b>
      </p>
        </div>
  </div>
</div>
</div>

</body>
</html>
