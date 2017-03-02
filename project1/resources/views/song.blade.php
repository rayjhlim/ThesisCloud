<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SongCloud - Songs</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>

            body {
                background-color: gray;
                font-size: 120%;
                font-family:Arial, Helvetica, sans-serif;
            }

            input, button {
                font-family:Arial, Helvetica, sans-serif;
                font-size: 120%;
            }

            h1 {
                margin: 15px;
            }

            a {
                display: block;
                margin:15px;
            }

            button {
                background-color: mediumpurple;

                position:absolute;
                bottom:0;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <h1>word</h1>

                <ul id='songlistarray'>
                <!-- embedded php block that loops through the $songs array to display links -->
                 <?php
                    // var_dump($songs);
                    foreach ($songs as $s) {
                        echo "<li><a href='lyrics/" . $s . "'>" . $s . "</a></li>";
                    }
                 ?>
                </ul>

                <ul>
                <?php

                    // var_dump($hasharray);
                    // example to display key value pairs
                    foreach ($hasharray as $k => $v) {
                        echo "<li>" . $k . ": " . $v . "</li>";
                    }

                ?>
                </ul>


                <div class="songs">

                </div>

                <div class="buttons">
                    <button id="backButton" onclick="window.location="'{{ url("cloud") }}'">Back</button>
                </div>
            </div>
        </div>

        <script>

            console.log('ran the script');

            function displaySongs(songlist) {

                songlist = ['we are never getting back together bitch', 'blank space', 'lol', 'blah'];

                for (var i = 0; i < songlist.length; i++) {
                    console.log(songlist[i]);

                    var hrefnode = document.createElement('a');

                    hrefnode.href = songlist[i] + ' ' + i;
                    hrefnode.innerHTML += songlist[i] + ' ' + i;

                    document.querySelector('.songs').appendChild(hrefnode);

                }
            }

            displaySongs();            

        </script>
    </body>
</html>
