<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>
    A&&F
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body>
    <div class="jumbotron text-center">
        <div class="container">
        <img src="Logo4.png" alt="" id="img">

        <h1>{{ $details['title'] }}</h1>
        <p>{{$details['description']}}</p>

    <p>{{ $details['body'] }}</p>

    <a href="http://localhost:8000/newPassword{{$details['description']}}"> إعادة إنشاء كلمة المرور </a>
</div>
      </div>
   

    <p>Thank you</p>
</body>
</html>