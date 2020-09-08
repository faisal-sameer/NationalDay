
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Random Name Picker</title>

  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/custom.modernizr.js"></script>
  <script src="js/jquery-latest.min.js"></script>

<style>
#values { position:relative;font-size:400%;text-align:center;margin: 0 auto;z-index:0; }
.name { overflow:hidden;display:block; }
#names { display:none;padding:5px; }
#namesbox { min-height:400px;font-size:32px;color:#333;resize:none;border:1px solid #F39C12; }
.extra { font-size:16px;margin-top:20px; }
#result1 { background:#000;color:#fbe34b;padding:20px;z-index:10;margin-top:-150px; }
#varnote { font-size:40px;text-align:center;padding:30px; }
.copyright { font-size:11px;font-family:Tahoma;color:#9B59B6; }
</style>

</head>
<body onload="reset();">

  <div class="full-head" style="width:100%;background:#111 url(img/header-bg.png) repeat-x center top;border-bottom:1px solid #D35400;">
	<div class="row">
		<div class="large-12 columns" style="padding-top:50px;background:#111 url(img/header-bg.png) repeat-x center top;z-index:20;">
		<ul class="button-group even-4">
      <li><a href="index.html" class="alert button" id="reset">Reset</a></li>
			<li><button class="button" id="list" onclick="namelist();">Name List</button></li>
      <li><button class="button" id="save" onclick="save();">Save &amp; Update</button></li>
   
      <li><button class="success button" id="go" onclick="go();">GO!</button></li>
    </ul>
		</div>
	</div>
	</div>

	<div class="row">
		<div class="large-12 columns">
			<h3 style="text-align:center;margin-top:30px;" id="headline">Let's see who is The Lucky One?</h3>
			
			<div id="varnote"><img src="img/logo.png"><div class="copyright">&copy; Coded by <strong>Heiswayi Nrird</strong>, June 2013</div></div>
			
      <div id="popdown">
      <div id="names" class="inbox"><textarea name="namesbox" id="namesbox" readonly></textarea></div>
      </div>
      
      <div id="values"></div>

      <input type="text" id="winner"/>
      <h3 style="text-align:center;margin-top:30px;" id="headline">Let's see who is The Lucky One?</h3>

		</div>
	</div>

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="js/foundation.min.js"></script>
  <script>$(document).foundation();</script>
  
<script>
var text;
var names = new Array('Barbara McFell',
                      'Tempo McKeteketly',
                      'Maonga Irpaae',
                      'Jose Tunisia',
                      'Bob Bobson',
                      'Harold Greenoff',
                      'Jeff Penn',
                      'Ewan Freedom',
                      'Benjamin Turkin',
                      'Robert Harper',
                      'Sally Cladwell',
                      'Gregory Tomson',
                      'Benita Dano',
                      'Tameka Chea',
                      'Fernando Guntrum',
                      'Cody Devita',
                      'Margery Moloney',
                      'Jessie Wagar',
                      'Jessie Burkhard',
                      'Cody Lamotte',
                      'Tabatha Cantley',
                      'Hugh Fullwood',
                      'Emilia Janusz',
                      'Erik Taketa',
                      'Lenore Laughter',
                      'Kathrine Palazzo',
                      'Lonnie Garron',
                      'Tyrone Shott',
                      'Gay Duble',
                      'Pearlie Newberg',
                      'Clinton Rayl',
                      'Louisa Strey',
                      'Saundra Ingenito',
                      'Fernando Jenkin',
                      'Maricela Tonkin',
                      'Allie Borjas',
                      'Clinton Rickenbacker',
                      'Cody Golay',
                      'Jerri Tienda',
                      'Nita Pippen',
                      'Alejandra Bonhomme',
                      'Nelson Eguia',
                      'Rae Velasques',
                      'Boyce Edeker',
                      'Cedrick Culotti',
                      'Elenora Nagindas',
                      'Arletta Miran',
                      'Alica Knudsvig',
                      'Von Ostroot',
                      'Tomika Nuesca',
                      'Felton Pattinson',
                      'Cristopher Laper',
                      'Shonna Parrotta',
                      'Sarina Macurdy',
                      'Waylon Companie',
                      'Shon Carratura',
                      'Jae Kneser',
                      'Janett Papiernik',
                      'Lynwood Bellar',
                      'Jeramy Contopoulos',
                      'Hong Nederostek',
                      'Gigi Mccarn',
                      'Sid Mursko',
                      'Bielser',
                      'Jospeh Lustberg',
                      'Spring Luckinbill',
                      'Ciera Chionchio',
                      'Marleen Litchard',
                      'Eldridge Brynga',
                      'Leif Dinho',
                      'Gigi Kornblatt',
                      'Idell Chagollan',
                      'Michale Mcclod'
                      );

function reset(){
  // re-enable go button
  setTimeout("$('#go').removeAttr('disabled')",11005);
  var namesbreak = "";
  if(gup('names') != ""){
    var names = gup('names');
    namesbreak = names.replace(/101/g,'\n');
    namesbreak = namesbreak.replace(/%20/g,' ');          
    }
    else   {
    const myServices = [];
    @foreach ($names as $service)
        myServices.push('{{ $service->user_name }}');
    @endforeach
    console.log(myServices)
      var names = myServices;
      
    for(var i in names){
      name = names[i];
      if (name == "" || typeof(name) == undefined){}else{
         namesbreak = namesbreak + name + "\n";
      }
    }
  }
  $("#namesbox").val(namesbreak);
}

function gup(para)
{
  para = para.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+para+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  if( results == null )
    return "";
  else
    return results[1];
}

function randOrd(){
	return (Math.round(Math.random())-0.5); 
}

function save(){
        $("#varnote").hide();
        $("#popdown").show();
        $("#values").hide();
        $("div").remove("#result1");
        savenames = $("#namesbox").val();
        savenames = savenames.replace(/\n\r?/g, '101');
        $('#headline').fadeOut();
        $('#headline').text('The name list is saved and updated.').fadeIn();
        $("#names").show();
        $('#namesbox').attr('disabled','disabled');
}

function namelist(){
        $("#varnote").hide();
        $('#namesbox').removeAttr('disabled','disabled');
        $('#headline').text('Configure name list');
        $("#popdown").show();
        $("#values").hide();
        $("#names").show();
        $('body').css({"overflow-y": "visible"});
}

// does the actual animation
function go(){
  $("#varnote").hide();
  $('body').css({"overflow-y": "hidden"});
  $('#go').attr('disabled','disabled');
  $('#list').attr('disabled','disabled');
  $('#save').attr('disabled','disabled');
  $('#headline').slideUp();
  $('#namesbox').slideDown();

  var count = 1;
  count = 1;
  $("div").remove("#result1");
  names = $("#namesbox").val();
  if(document.all) { // IE
    names=names.split("\n");
  }
  else { //Mozilla
    names=names.split("\n");
  }
  $("#values").show();
  $(".name").show();
  $("#popdown").hide();
  $("div").remove(".name");
  $("div").remove(".extra");
  $("#playback").html("");
  newtop = names.length * 200 * -1;
  //$('#values').css({top: -300});
  $('#values').css({top: + newtop});	
  names.sort( randOrd );
  var fruits = new Array ( "apple", "pear", "orange", "banana" );
  //console.log(fruits);
  //console.log(names);
  //alert(newtop);
  for(var i in names){
    if (names[i] == "" || typeof(names[i]) == undefined){
      count = count-1;
    } else {
      name = names[i];
      //console.log(name);
      $('#values').append('<div id=result'+count+' class=name>'+name+'</div>');
    }
    count = count+1;
  }
  for(var i in names){
    if (names[i] == "" || typeof(names[i]) == undefined){}else{
      name = names[i];
      $('#values').append('<div class=name>'+name+'</div>');
    }
    count = count+1;
  }
  for(var i in names){
    if (names[i] == "" || typeof(names[i]) == undefined){}else{
      name = names[i];
      $('#values').append('<div class=name>'+name+'</div>');
    }
    count = count+1;
  }
  text = $('#result1').text()
  $('#values').animate({top: '+176'},5000);

  // make it stand out
  setTimeout("standout(text)",5000);
  //setTimeout("$('#playback').hide('slow')",11005);
}

function standout(text){

        $('#result1').removeClass('name');

        $('.name').animate({opacity: .25});
        $('#result1').animate({height: '+=60px'});
        $('#result1').append('<div class="extra"><a class="small alert button" href="#" onClick="removevictim();"> 'text'Remove name from list</a></div>');
        $('#go').removeAttr('disabled','disabled');
        $('#list').removeAttr('disabled','disabled');
        $('#save').removeAttr('disabled','disabled');
        $('#headline').text('لدينا فائز!');
        $('#headline').slideDown();
}

function removevictim(){
	// Removing victim from array and UI
	// names = names.filter(function(){ return true});
	// Rewriting namesbox contents
  $('#headline').text('لدينا فائز!');

	var nameupdated = "";
	for(var i in names){
		name = names[i];
   
                if (name == "" || name == text || typeof(name) == undefined){}else{
			nameupdated = nameupdated + "\n" + name;
		}
	}
	$('#namesbox').val("");
  $('#namesbox').val(nameupdated);
  $('#result1').html("Removed");
  $('#result1').fadeOut(1000, function(){
    $("div").remove("#result1");
  });
  $("div").remove(".name");
  $("div").remove(".extra");
  $('#headline').text('OK, done! Let\'s see who is next? Just click "GO!" button for next roll.');
}

</script>

</body>
</html>
