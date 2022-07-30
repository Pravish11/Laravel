<!DOCTYPE html>
<html>
<head>
    <title>Xtreme Fitness Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <style>
        .reviews {
      display: flex;

      flex-direction: row-reverse;
      float: left
    }

    .reviews>input {
      display: none;
    }

    .reviews>label {
      position: relative;
      width: 19px;
      font-size: 25px;
      color: red;
      cursor: pointer;
    }

    .reviews>label::before {
      content: "\2605";
      position: absolute;
      opacity: 0;
    }

    .reviews>label:hover:before,
    .reviews>label:hover~label:before {
      opacity: 1 !important;
    }

    .reviews>input:checked~label:before {
      opacity: 1;
    }

    .reviews:hover>input:checked~label:before {
      opacity: 0.4;
    }
  
        .btn1{
            margin-left: 40%;
            width: 100px;
            border-radius: 5px;
            color: white;
            background: blue;
        }
    
    </style>
</head>
<body>
  <br>
<div class="container">
    @yield('content')
</div>
<br><br>
<a href="../home"><button class="btn1">Back</button></a>
</body>
</html>