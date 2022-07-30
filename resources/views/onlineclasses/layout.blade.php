<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xtreme Fitness</title>
    <link rel="stylesheet" href="{{url('css/mystyle.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
    
</head>
<body>
    <div class="onlineClasses-image">
    <?php
    $activemenu = "onlineClasses"; 
    ?>
    @include('menu')
    </div>
    <div class="onlineClasses-text">
        <h1 style="font-size:50px;font-family:sans-serif;">ONLINE CLASSES</h1>
    </div>
    <h2 style="text-align: center;">OUR WEEKLY CLASSES:</h2>
    <p style="text-align: center;">Our passionate team train you at home with a set of exercises to keep you healthly.<br>Join our classes through zoom and enjoy your session!</p>
    <div class="container">@yield('content')</div>
    
    <br><br><br>
</body>
</html>