<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Xtreme Fitness</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/js/app.js'])

        <link rel="stylesheet" href="{{url('css/mystyle.css')}}">

        <style>
            button{
                width: 250px;
                  height: 40px;
                  font-size: 20px;
                  background-color: #0736a6;
                  border: none;
                  color: white;
                  cursor: pointer;
                  
                  border-radius: 25px;
                  font-family: sans-serif;
                  font-weight: bold;
                 
            }
            button:hover{
                background-color: #000033;
            }
            ::placeholder
            {
                color: white;
            }

            label{
                color: white;
            }
                </style>
    </head>
    <body class="loginstyle bodystyle">
        <?php
        $activemenu = "login";
        //include('includes/menu.php');?>
        @include('menu')
        {{ $slot }}
        <!--div class="font-sans text-gray-900 antialiased" >
            
        </div-->
        <div style="width: 100%;position:absolute;bottom:0px;">@include('footer')</div>
    </body>
</html>
