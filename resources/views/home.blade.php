@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><img src="/img/search.png" class="bounce-in-top" id="trophy" ></div>

                <div class="card-body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 

                    <h3  id="tit">التحدي الأول</h3>
          
<div class="row" id="cen">
    <div class="column">
        <img src="/img/team.png" id="stas" class="bounce-in-top" >
        <p>{{$challengeinfo1}}</p>
    </div>
    <div class="column" >
        <p>
            <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
        </p>
          <p>فيصل</p>
          <p>ياسر</p>
          <p>عزو</p>

    </div>
    <div  class="column" >
        <p>
            <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
        </p>
              <p>فيصل</p>
              <p>ياسر</p>
              <p>عزو</p>

        </div>
    <div class="column" >
        <img src="/img/correct.png"  class="bounce-in-top" id="stas" >

      <p>{{$challengeAnswer1}}</p>
    </div>
    
  </div>
  <p>
    أكثر المدن المشاركة</p>
    <div class="pie" id="piechart"></div>
                    <hr>
                    <h3  id="tit">التحدي الثاني</h3>
          
                    <div class="row" id="cen">
                        <div class="column">
                            <img src="/img/team.png" id="stas" class="bounce-in-top" >
                            <p>{{$challengeinfo2}}</p>
                        </div>
                        <div class="column" >
                            <p>
                                <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
                            </p>
                              <p>فيصل</p>
                              <p>ياسر</p>
                              <p>عزو</p>
                    
                        </div>
                        <div  class="column" >
                            <p>
                                <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
                            </p>
                                  <p>فيصل</p>
                                  <p>ياسر</p>
                                  <p>عزو</p>
                    
                            </div>
                        <div class="column" >
                            <img src="/img/correct.png"  class="bounce-in-top" id="stas" >
                    
                          <p>{{$challengeAnswer2}}</p>
                        </div>
                        
                      </div>
                      <p>
                        أكثر المدن المشاركة</p>
                        <div class="pie" id="piechart2"></div>
                <hr>
                <h3  id="tit">التحدي الثالث</h3>
          
                <div class="row" id="cen">
                    <div class="column">
                        <img src="/img/team.png" id="stas" class="bounce-in-top" >
                        <p>{{$challengeinfo3}}</p>
                    </div>
                    <div class="column" >
                        <p>
                            <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
                        </p>
                          <p>فيصل</p>
                          <p>ياسر</p>
                          <p>عزو</p>
                
                    </div>
                    <div  class="column" >
                        <p>
                            <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
                        </p>
                              <p>فيصل</p>
                              <p>ياسر</p>
                              <p>عزو</p>
                
                        </div>
                    <div class="column" >
                        <img src="/img/correct.png"  class="bounce-in-top" id="stas" >
                
                      <p>{{$challengeAnswer3}}</p>
                    </div>
                    
                  </div>
                  <p>
                    أكثر المدن المشاركة</p>
                    <div class="pie" id="piechart3"></div>
            <hr>

            <h3  id="tit">التحدي الرابع</h3>
          
            <div class="row" id="cen">
                <div class="column">
                    <img src="/img/team.png" id="stas" class="bounce-in-top" >
                    <p>{{$challengeinfo4}}</p>
                </div>
                <div class="column" >
                    <p>
                        <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
                    </p>
                      <p>فيصل</p>
                      <p>ياسر</p>
                      <p>عزو</p>
            
                </div>
                <div  class="column" >
                    <p>
                        <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
                    </p>
                          <p>فيصل</p>
                          <p>ياسر</p>
                          <p>عزو</p>
            
                    </div>
                <div class="column" >
                    <img src="/img/correct.png"  class="bounce-in-top" id="stas" >
            
                  <p>{{$challengeAnswer4}}</p>
                </div>
                
              </div>
              <p>
                أكثر المدن المشاركة</p>
                <div class="pie" id="piechart4"></div>
        <hr>
        <h3  id="tit">التحدي الخامس</h3>
          
            <div class="row" id="cen">
                <div class="column">
                    <img src="/img/team.png" id="stas" class="bounce-in-top" >
                    <p>{{$challengeinfo5}}</p>
                </div>
                <div class="column" >
                    <p>
                        <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
                    </p>
                      <p>فيصل</p>
                      <p>ياسر</p>
                      <p>عزو</p>
            
                </div>
                <div  class="column" >
                    <p>
                        <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
                    </p>
                          <p>فيصل</p>
                          <p>ياسر</p>
                          <p>عزو</p>
            
                    </div>
                <div class="column" >
                    <img src="/img/correct.png"  class="bounce-in-top" id="stas" >
            
                  <p>{{$challengeAnswer5}}</p>
                </div>
                
              </div>
              <p>
                أكثر المدن المشاركة</p>
                <div class="pie" id="piechart5"></div>
    <hr>

    <h3  id="tit">التحدي السادس</h3>
          
    <div class="row" id="cen">
        <div class="column">
            <img src="/img/team.png" id="stas" class="bounce-in-top" >
            <p>{{$challengeinfo6}}</p>
        </div>
        <div class="column" >
            <p>
                <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
            </p>
              <p>فيصل</p>
              <p>ياسر</p>
              <p>عزو</p>
    
        </div>
        <div  class="column" >
            <p>
                <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
            </p>
                  <p>فيصل</p>
                  <p>ياسر</p>
                  <p>عزو</p>
    
            </div>
        <div class="column" >
            <img src="/img/correct.png"  class="bounce-in-top" id="stas" >
    
          <p>{{$challengeAnswer6}}</p>
        </div>
        
      </div>
      <p>
        أكثر المدن المشاركة</p>
        <div class="pie" id="piechart6"></div>
<hr>
<h3  id="tit">التحدي السابع</h3>
          
    <div class="row" id="cen">
        <div class="column">
            <img src="/img/team.png" id="stas" class="bounce-in-top" >
            <p>{{$challengeinfo7}}</p>
        </div>
        <div class="column" >
            <p>
                <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
            </p>
              <p>فيصل</p>
              <p>ياسر</p>
              <p>عزو</p>
    
        </div>
        <div  class="column" >
            <p>
                <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
            </p>
                  <p>فيصل</p>
                  <p>ياسر</p>
                  <p>عزو</p>
    
            </div>
        <div class="column" >
            <img src="/img/correct.png"  class="bounce-in-top" id="stas" >
    
          <p>{{$challengeAnswer7}}</p>
        </div>
        
      </div>
      <p>
        أكثر المدن المشاركة</p>
        <div class="pie" id="piechart7"></div>
<hr>
<h3  id="tit">التحدي الثامن</h3>
          
    <div class="row" id="cen">
        <div class="column">
            <img src="/img/team.png" id="stas" class="bounce-in-top" >
            <p>{{$challengeinfo8}}</p>
        </div>
        <div class="column" >
            <p>
                <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
            </p>
              <p>فيصل</p>
              <p>ياسر</p>
              <p>عزو</p>
    
        </div>
        <div  class="column" >
            <p>
                <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
            </p>
                  <p>فيصل</p>
                  <p>ياسر</p>
                  <p>عزو</p>
    
            </div>
        <div class="column" >
            <img src="/img/correct.png"  class="bounce-in-top" id="stas" >
    
          <p>{{$challengeAnswer8}}</p>
        </div>
        
      </div>
      <p>
        أكثر المدن المشاركة</p>
        <div class="pie" id="piechart8"></div>
<hr>
<h3  id="tit">التحدي التاسع</h3>
          
    <div class="row" id="cen">
        <div class="column">
            <img src="/img/team.png" id="stas" class="bounce-in-top" >
            <p>{{$challengeinfo9}}</p>
        </div>
        <div class="column" >
            <p>
                <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
            </p>
              <p>فيصل</p>
              <p>ياسر</p>
              <p>عزو</p>
    
        </div>
        <div  class="column" >
            <p>
                <img src="/img/trophy.png" id="stas" class="bounce-in-top" >
            </p>
                  <p>فيصل</p>
                  <p>ياسر</p>
                  <p>عزو</p>
    
            </div>
        <div class="column" >
            <img src="/img/correct.png"  class="bounce-in-top" id="stas" >
    
          <p>{{$challengeAnswer9}}</p>
        </div>
        
      </div>
      <p>
        أكثر المدن المشاركة</p>
        <div class="pie" id="piechart9"></div>
<hr>

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
<p >فيصل</p>
<p>عزو</p>
<p>ياسر</p>
</div>

</div>
<div class="form-group">
<div  class="col-lg-9" id="win1" >
    من خارج جامعة أم القرى
</div>
<div  style="text-align: center">
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['المدن', 'إحصائيات المدن المشاركة'],
  ['مكة', 10],
  ['جدة', 2],
  ['بريدة', 4],
  ['ينبع', 2],
  ['الرياض', 55],

]);

  // Optional; add a title and set the width and height of the chart

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data);
}
</script>
<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    // Draw the chart and set the chart values
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
      ['المدن', 'إحصائيات المدن المشاركة'],
      ['عنيزة', 1],
      ['الدمام', 5],
      ['بريدة', 2],
      ['ينبع', 2],
      ['الرياض', 9],
    
    ]);
    
      // Optional; add a title and set the width and height of the chart
    
      // Display the chart inside the <div> element with id="piechart"
      var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
      chart.draw(data);
    }
    </script>
    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        // Draw the chart and set the chart values
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
          ['المدن', 'إحصائيات المدن المشاركة'],
          ['تبوك', 3],
          ['الخبر', 4],
          ['بريدة', 2],
          ['المدينة', 2],
          ['جدة', 9],
        
        ]);
        
          // Optional; add a title and set the width and height of the chart
        
          // Display the chart inside the <div> element with id="piechart"
          var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
          chart.draw(data);
        }
        </script>
        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            
            // Draw the chart and set the chart values
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
              ['المدن', 'إحصائيات المدن المشاركة'],
              ['تبوك', 3],
              ['الخبر', 4],
              ['بريدة', 2],
              ['المدينة', 2],
              ['جدة', 9],
            
            ]);
            
              // Optional; add a title and set the width and height of the chart
            
              // Display the chart inside the <div> element with id="piechart"
              var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
              chart.draw(data);
            }
            </script>
            <script type="text/javascript">
                // Load google charts
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                
                // Draw the chart and set the chart values
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                  ['المدن', 'إحصائيات المدن المشاركة'],
                  ['تبوك', 3],
                  ['الخبر', 4],
                  ['بريدة', 2],
                  ['المدينة', 2],
                  ['جدة', 9],
                
                ]);
                
                  // Optional; add a title and set the width and height of the chart
                
                  // Display the chart inside the <div> element with id="piechart"
                  var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
                  chart.draw(data);
                }
                </script>
                 <script type="text/javascript">
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);
                    
                    // Draw the chart and set the chart values
                    function drawChart() {
                      var data = google.visualization.arrayToDataTable([
                      ['المدن', 'إحصائيات المدن المشاركة'],
                      ['تبوك', 3],
                      ['الخبر', 4],
                      ['بريدة', 2],
                      ['المدينة', 2],
                      ['جدة', 9],
                    
                    ]);
                    
                      // Optional; add a title and set the width and height of the chart
                    
                      // Display the chart inside the <div> element with id="piechart"
                      var chart = new google.visualization.PieChart(document.getElementById('piechart6'));
                      chart.draw(data);
                    }
                    </script>
                     <script type="text/javascript">
                        // Load google charts
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        
                        // Draw the chart and set the chart values
                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                          ['المدن', 'إحصائيات المدن المشاركة'],
                          ['تبوك', 3],
                          ['الخبر', 4],
                          ['بريدة', 2],
                          ['المدينة', 2],
                          ['جدة', 9],
                        
                        ]);
                        
                          // Optional; add a title and set the width and height of the chart
                        
                          // Display the chart inside the <div> element with id="piechart"
                          var chart = new google.visualization.PieChart(document.getElementById('piechart7'));
                          chart.draw(data);
                        }
                        </script> <script type="text/javascript">
                // Load google charts
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                
                // Draw the chart and set the chart values
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                  ['المدن', 'إحصائيات المدن المشاركة'],
                  ['تبوك', 3],
                  ['الخبر', 4],
                  ['بريدة', 2],
                  ['المدينة', 2],
                  ['جدة', 9],
                
                ]);
                
                  // Optional; add a title and set the width and height of the chart
                
                  // Display the chart inside the <div> element with id="piechart"
                  var chart = new google.visualization.PieChart(document.getElementById('piechart8'));
                  chart.draw(data);
                }
                </script> <script type="text/javascript">
                // Load google charts
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                
                // Draw the chart and set the chart values
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                  ['المدن', 'إحصائيات المدن المشاركة'],
                  ['تبوك', 3],
                  ['الخبر', 4],
                  ['بريدة', 2],
                  ['المدينة', 2],
                  ['جدة', 9],
                
                ]);
                
                  // Optional; add a title and set the width and height of the chart
                
                  // Display the chart inside the <div> element with id="piechart"
                  var chart = new google.visualization.PieChart(document.getElementById('piechart9'));
                  chart.draw(data);
                }
                </script>