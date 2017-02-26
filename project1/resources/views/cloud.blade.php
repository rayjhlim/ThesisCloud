<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SongCloud - Cloud</title>

        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <script type="text/javascript" src="{{ URL::asset('js/lib/d3/d3.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/lib/d3/d3.layout.cloud.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/d3.wordcloud.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/example/example.words.js') }}"></script>

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>

        $( function() {
            var artistMatches = [
              "Beyonce",
              "Ed Sheeran",
              "The Fray",
              "Frank Ocean",
              "Frank Sinatra",
              "Sam Smith",
              "Flume",
              "Louis the Child",
              "One Direction",
              "Taylor Swift"
            ];
            $( ".tags" ).autocomplete({
                minLength: 3,
                source: function( request, response ) {
                    var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
                    response( $.grep( artistMatches, function( item ){
                        return matcher.test( item );
                    }) );
                }
            });
        } );


        </script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            input, button {
                font-family:Arial, Helvetica, sans-serif;
                font-size: 120%;
            }

            body {
                background-color: gray;
                font-size: 120%;
                font-family:Arial, Helvetica, sans-serif;

                margin-top:auto;

                text-align: center;
            }

            #searchTextBox {
                border-style: solid;
                border-width: 4px;
                border-color: mediumpurple;

                margin: auto;

                display: block;
            }

            button {
                background-color: mediumpurple;
                
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
                margin-bottom:auto;
            }

            .cloudDiv {
                background-color: white;
                margin-bottom: 20px;
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

                <div class="cloudDiv" id="cloudID">
                    <div id='wordcloud'></div>
                </div>

                <div class="controls">
                    <input class="tags" id="searchTextBox" type="text">
                    <button id="searchButton" onclick="search()">Search</button>
                    <button id="addToCloudButton" onclick="addToCloud()">Add to Cloud</button>

                    <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
                </div>
                 
            </div>
        </div>

        <script>

            d3.wordcloud()
                .size([500, 300])
                .words(words)
                .spiral("rectangular")
                .start();

            function search() {
                var word = document.querySelector('#searchTextBox').value;

            }

            function addToCloud() {
                var word = document.querySelector('#searchTextBox').value;

            }

    </script>
    </body>
</html>
