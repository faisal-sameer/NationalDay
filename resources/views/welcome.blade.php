<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>


/* The actual timeline (the vertical ruler) */
.button{
  width: 150px;
  margin: auto;
  margin-top: 200px;
  padding: 10px;
  border: 1px solid #fff;
  animation:button 4s ease-out normal ;

}
@keyframes button{
  0%{
    transform: scale(0.9);
  }
  25%{
    transform: scale(0.9);
  }
  60%{
    transform: scale(3);
  }
  100%{
    visibility: hidden;
  opacity: 0;
  transition: visibility 2s, opacity 2s linear;
    transform: scale(0.9);

  }
}
#cf {
  position:relative;
  height:281px;
  width:450px;
  margin:0 auto;
}

#cf img {
  position:absolute;
  left:0;
  -webkit-transition: opacity 1s ease-in-out;
  -moz-transition: opacity 1s ease-in-out;
  -o-transition: opacity 1s ease-in-out;
  transition: opacity 1s ease-in-out;
}

#cf img.top:hover {
  opacity:0;
}
#test p {
    margin-top: 25px;
    font-size: 21px;
    text-align: center;
    animation: fadein 3s;
    -moz-animation: fadein 5s; /* Firefox */
    -webkit-animation: fadein 5s; /* Safari and Chrome */
    -o-animation: fadein 5s; /* Opera */
}
@keyframes fadein {
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-moz-keyframes fadein { /* Firefox */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-webkit-keyframes fadein { /* Safari and Chrome */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-o-keyframes fadein { /* Opera */
    from {
        opacity:0;
    }
    to {
        opacity: 1;
    }
}
</style>
</head>
<body>
  <div id="cf">
    <div id="test" class="button"><p>   <img class="bottom" src="/king-ad.jpg" style="width: 50%" /> </p> </div>
    <div id="test" class="button"><p>   <img class="bottom" src="/king-fh.jpg" style="width: 50%" /> </p> </div>
    <div id="test" class="button"><p>   <img class="bottom" src="/king-kh.jpg" style="width: 50%" /> </p> </div>

  </div>
</body>
</html>
